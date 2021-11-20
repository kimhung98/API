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
                            <strong class="card-title">Thêm</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('supplier.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="admin_view" value="true">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter name supplier...." />
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="Enter email supplier...." />
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" placeholder="Enter phone ...." />
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" placeholder="Enter address...." />
                                </div>

                                <button type="submit" class="btn btn-default" style="background: #0d6aad; color: #4c110f">Thêm thể loại</button>
                                <button type="reset" class="btn btn-default" style="background: #4cae4c; color: #0c0c0c">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

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
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endsection
