@extends('admin.layouts.app')
@section('content')

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>User</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="admin/home">Dashboard</a></li>
                                <li class="active">User</li>
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
                            <strong class="card-title">Thêm Quản trị</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="admin_view" value="true">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter name......"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="Enter email....."/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Enter password...."/>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" placeholder="Enter phone...."/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" placeholder="Enter address...."/>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input class="form-control" name="gender" placeholder="Enter gender...."/>
                                </div>
                                <div class="form-group">
                                    <label>Role: </label>
                                    <label class="radio-inline">
                                        <input name="role" value="admin" type="radio">Admin
                                    </label>
                                    <label class="radio-inline">
                                        <input name="role" value="employee" checked="" type="radio">Employee
                                    </label>
                                    <label class="radio-inline">
                                        <input name="role" value="client" checked="" type="radio">Client
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default" style="background: #7a43b6;color: #0c0c0c">Thêm</button>
                                <button type="reset" class="btn btn-default" style="background: #8a6d3b; color: #0c0c0c">Reset</button>
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
