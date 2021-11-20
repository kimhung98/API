<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    function index()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/category');
        $category = json_decode($res->getBody()->getContents());
        $products = [];
        foreach ($category as $item) {
            $res = $client->request('GET', 'http://huongdichvu.local/api/product/by/' . $item->name);
            $product = json_decode($res->getBody()->getContents());
            array_push($products, $product);
        }

        return view('web.home', compact('category', 'products'));
    }

    function getLogin()
    {
        $destination = $_GET ? 'shopping-cart' : 'login';
        return view('web.login', compact('destination'));
    }

    function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($request->destination == 'login') {
                if ($user->role == 'admin' || $user->role == 'employee') {
                    return redirect()->route('admin.home');
                }
                return redirect()->route('home');
            }
            return redirect()->route('show.cart');
        } else {
            return redirect()->route('user.login')->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    function showProductInCategory($category)
    {
        $getCategory = Category::where('name', $category)->get();
        $product = Product::where('category_id', $getCategory[0]->id)->get();
        foreach ($product as $item) {
            $item->category = $category;
        }
        return $product;
    }

    function getProduct($id)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/product/' . $id);
        $product = json_decode($res->getBody()->getContents());

        return view('web.product', compact('product'));
    }

    function addToCart(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/product/' . $id);
        $product = json_decode($res->getBody()->getContents());

        Cart::add($id, $product->name, $request->quality, $product->price, 0, ['image' => $product->image]);
        return redirect()->route('show.cart');
    }

    function getShopingCart()
    {
        return view('web.cart');
    }

    function destroyItemCart(Request $request, $id)
    {
        Cart::remove($id);
        return redirect()->route('show.cart');
    }

    function payment(Request $request)
    {
        $cart = new \App\Cart();
        $cart->user_id = Auth::id();
        $product_id = [];
        $quantity = [];
        foreach (Cart::content() as $item) {
            array_push($product_id, $item->id);
            array_push($quantity, $item->qty);
        }
        $cart->product_id = implode(',', $product_id);
        $cart->quantity = implode(',', $quantity);
        $cart->total = Cart::Subtotal($decimals = 0, '', '');

        $cart->save();
        Cart::destroy();

        return redirect()->route('home')->with('thongbao', 'Bạn đạt hàng thành công!');

    }
}
