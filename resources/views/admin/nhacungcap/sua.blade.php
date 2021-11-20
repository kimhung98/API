@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Supplier</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">Supplier</li>
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
                            <strong class="card-title">Update </strong>
                            <small>{{ $supplier->name }}</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="admin_view" value="true">
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter name supplier...."
                                           value="{{ $supplier->name }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="Enter email supplier...."
                                           value="{{ $supplier->email }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" placeholder="Enter phone supplier...."
                                           value="{{ $supplier->phone }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" placeholder="Enter address supplier...."
                                           value="{{ $supplier->address }}"/>
                                </div>

                                <button type="submit" class="btn btn-default" style="background: #5d9c0a; color: #0c0c0c">Sửa</button>
                                <button type="reset" class="btn btn-default" style="background: #00d6b2; color: #0c0c0c">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
