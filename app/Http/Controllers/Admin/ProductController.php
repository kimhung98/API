<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        foreach ($product as $item) {
            $item->category_id = $item->category->name;
            $item->supplier_id = $item->supplier->name;
        }
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect()->route('admin.product.create')->with('error', 'Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $image = random_int(100, 999) . "_" . $name;
            while (file_exists('upload/sanpham/' . $image)) {
                $image = random_int(100, 999) . "_" . $name;
            }
            $file->move('upload/sanpham/', $image);

            $product->image = $image;
        }
        $product->save();
        if ($request->admin_view) {
            return redirect()->route('admin.product.index');
        }
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $product->category->name;
        $product->supplier_id = $product->supplier->name;
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->origin = $request->origin;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect()->route('admin.product.create')->with('error', 'Bạn chỉ được chọn file có đuôi png,jpg');
            }
            $name = $file->getClientOriginalName();
            $image = random_int(100, 999) . "_" . $name;
            while (file_exists('upload/sanpham/' . $image)) {
                $image = random_int(100, 999) . "_" . $name;
            }
            $file->move('upload/sanpham/', $image);
            if (file_exists('upload/sanpham/' . $product->image)) {
                unlink("upload/sanpham/" . $product->image);
            }
            $product->image = $image;
        }
        $product->save();
        if ($request->admin_view) {
            return redirect()->route('admin.product.index');
        }
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists('upload/sanpham/' . $product->image)) {
            unlink("upload/sanpham/" . $product->image);
        }
        return $product->delete();
    }
}
