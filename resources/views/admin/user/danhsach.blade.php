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
                            <strong class="card-title">LIST USER</strong>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Role</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr class="odd gradeX">
                                        <td class="id">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td class="center"><a href="" class="delete"><i
                                                    class="fas fa-trash-alt"></i> Delete</a></td>
                                        <td class="center"><a href="{{ route('admin.user.edit', $item->id) }}"><i
                                                    class="far fa-edit"></i> Edit</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
        $(document).ready(function () {
            $('#bootstrap-data-table').DataTable();
        });
        $('.delete').click(function (e) {
            e.preventDefault();
            var id = $(this).parents('tr').find('.id').text();
            $.ajax({
                url: '/api/user/' + id,
                type: 'DELETE',
                success: function(data){
                    alert('Bạn đã xóa người dùng có id là: ' + id);
                    location.reload();
                },
                error: function() {}
            });
        });
    </script>
@endsection
