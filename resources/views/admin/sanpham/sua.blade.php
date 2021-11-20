@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">Sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sửa </strong>
                            <small>{{ $product->name }}</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="admin_view" value="true">
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Nhập tên sản phẩm..."
                                           value="{{ $product->name }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="demo" class="form-control ckeditor" rows="3">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" name="price"
                                           placeholder="Nhập số tiền giảm giá sản phẩm..."
                                           value="{{ $product->price }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Origin</label>
                                    <input class="form-control" name="origin"
                                           placeholder="Nhập số tiền giảm giá sản phẩm..."
                                           value="{{ $product->origin }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input class="form-control" name="brand" placeholder="Nhập "
                                           value="{{ $product->brand }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" name="quantity"
                                           placeholder="Nhập số tiền giảm giá sản phẩm..."
                                           value="{{ $product->quantity }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control" name="supplier_id" id="supplier_id">
                                        @foreach($supplier as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"> Sửa</button>
                                <button type="reset" class="btn btn-default"> Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
