@extends('backend.layouts.master')

@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    @if (session()->has('success'))
        <h3 style="color: green">{!! session()->get('success') !!}</h3>
    @endif

    @if (session()->has('fail'))
        <h3 style="color: red">{!! session()->get('fail') !!}</h3>
    @endif

    @if (session()->has('fail_update'))
        <h3 style="color: red">{!! session()->get('fail_update') !!}</h3>
    @endif

    @if (session()->has('success_update'))
        <h3 style="color: green">{!! session()->get('success_update') !!}</h3>
    @endif
@endsection
@section('content')
    <!-- Content -->
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Tên</th>
                                <th>Thời gian</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        {{-- <a style="display: inline-block; width: 67px;" href="{{ route('backend.user.show',$user->id) }}" class="btn btn-success">Show</a> --}}
                                        <a style="display: inline-block; width: 67px;" href="{{ route('backend.user.edit',$user->id) }}" class="btn btn-warning">Edit</a>

                                        <form style="display: inline-block;" action="{{ route('backend.user.destroy', $user->id) }}" method="post" accept-charset="utf-8">
                                            @csrf
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
