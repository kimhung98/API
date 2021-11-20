@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Thể loại</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">Thể loại</li>
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
                            <small>{{ $category->name }}</small>
                        </div>
                        <div class="card-body">
                                <form action="{{ route('category.update', $category->id) }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="admin_view" value="true">
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label>Tên thể loại</label>
                                        <input class="form-control" name="name" placeholder="Nhập tên thể loại" value="{{ $category->name }}"/>
                                    </div>
                                    <button type="submit" class="btn btn-default">Sửa</button>
                                    <button type="reset" class="btn btn-default">Làm mới </button>
                                </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
