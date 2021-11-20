<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//gọi view trong admin
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function getUser() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/user');
        $user = json_decode($res->getBody()->getContents());

        return view('admin.user.danhsach', compact('user'));
    }

    public function createUser() {
        return view('admin.user.them');
    }

    public function editUser($id) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/user/' . $id);
        $user = json_decode($res->getBody()->getContents());

        return view('admin.user.sua', compact('user'));
    }

    public function getCategoy() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/category');
        $category = json_decode($res->getBody()->getContents());

        return view('admin.theloai.danhsach', compact('category'));
    }

    public function createCategoy() {
        return view('admin.theloai.them');
    }

    public function editCategoy($id) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/category/' . $id);
        $category = json_decode($res->getBody()->getContents());

        return view('admin.theloai.sua', compact('category'));
    }

    public function getProduct() {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://huongdichvu.local/api/product');
            $product = json_decode($res->getBody()->getContents());

        return view('admin.sanpham.danhsach', compact('product'));
    }

    public function createProduct() {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', 'http://huongdichvu.local/api/category');
        $category = json_decode($res->getBody()->getContents());

        $res = $client->request('GET', 'http://huongdichvu.local/api/supplier');
        $supplier = json_decode($res->getBody()->getContents());

        return view('admin.sanpham.them', compact('category', 'supplier'));
    }

    public function editProduct($id) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/product/' . $id);
        $product = json_decode($res->getBody()->getContents());

        $res = $client->request('GET', 'http://huongdichvu.local/api/category');
        $category = json_decode($res->getBody()->getContents());

        $res = $client->request('GET', 'http://huongdichvu.local/api/supplier');
        $supplier = json_decode($res->getBody()->getContents());

        return view('admin.sanpham.sua', compact('category', 'supplier', 'product'));
    }

    public function getSupplier() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/supplier');
        $supplier = json_decode($res->getBody()->getContents());

        return view('admin.nhacungcap.danhsach', compact('supplier'));
    }

    public function createSupplier() {
        return view('admin.nhacungcap.them');
    }

    public function editSupplier($id) {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/supplier/' . $id);
        $supplier = json_decode($res->getBody()->getContents());

        return view('admin.nhacungcap.sua', compact('supplier'));
    }

    public function getCart() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://huongdichvu.local/api/cart');
        $cart = json_decode($res->getBody()->getContents());

        return view('admin.order.danhsach', compact('cart'));
    }
}
