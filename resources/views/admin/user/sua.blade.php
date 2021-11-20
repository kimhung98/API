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
                            <strong class="card-title">Update: </strong>
                            <small>{{ $user->name }}</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="admin_view" value="true">
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" placeholder="Enter name...."
                                           value="{{$user->name}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" readonly="" class="form-control" name="email"
                                           placeholder="Enter email...." value="{{$user->email}}"/>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="changePassword" name="changePassword">
                                    <label>Change Password</label>
                                    <input type="password" class="form-control password" name="password"
                                           placeholder="Enter password" disabled=""/>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" placeholder="Enter phone...."
                                           value="{{ $user->phone }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" placeholder="Enter address...."
                                           value="{{ $user->address }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input class="form-control" name="gender" placeholder="Enter gender...."
                                           value="{{ $user->gender }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <label class="radio-inline">
                                        <input name="role" value="admin"
                                               @if($user->role == 'admin')
                                               {{"checked"}}
                                               @endif
                                               type="radio">Admin
                                    </label>
                                    <label class="radio-inline">
                                        <input name="role" value="employee"
                                               @if($user->role == 'employee')
                                               {{"checked"}}
                                               @endif
                                               type="radio">Employee
                                    </label>
                                    <label class="radio-inline">
                                        <input name="role" value="client"
                                               @if($user->role == 'client')
                                               {{"checked"}}
                                               @endif
                                               type="radio">Client
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Sửa</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection
