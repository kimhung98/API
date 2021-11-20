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
                            <strong class="card-title">Thêm</strong>
                        </div>
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-success">
                                    {{session('error')}}
                                </div>
                            @endif
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="admin_view" value="true">
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
                                    <input class="form-control" name="name" placeholder="Nhập tên sản phẩm  ..."/>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="demo" class="form-control ckeditor" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" name="price" value="0"
                                           placeholder="Nhập giá tiền  sản phẩm..."/>
                                </div>
                                <div class="form-group">
                                    <label>Origin</label>
                                    <input class="form-control" name="origin"
                                           placeholder="Nhập nguồn gốc sản phẩm"/>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input class="form-control" name="brand" placeholder="Nhập thương hiệu sản phẩm"/>
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" name="quantity"
                                           placeholder="Nhập số lượng sản phẩm..."/>
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

                                <button type="submit" class="btn btn-default"> Thêm</button>
                                <button type="reset" class="btn btn-default"> Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="admin/assets/js/init/datatables-init.js"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table').DataTable();
        });
    </script>
@endsection
