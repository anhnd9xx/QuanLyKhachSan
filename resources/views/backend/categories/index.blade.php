@extends('backend.layouts.master')

@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh mục sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh mục sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    @if (session()->has('success'))
        <h3 style="color: green">{!! session()->get('success') !!}</h3>
    @endif

{{--    @if (session()->has('fail'))--}}
{{--        <h3 style="color: red">{!! session()->get('fail') !!}</h3>--}}
{{--    @endif--}}

{{--    @if (session()->has('fail_update'))--}}
{{--        <h3 style="color: red">{!! session()->get('fail_update') !!}</h3>--}}
{{--    @endif--}}

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
                            <h3 class="card-title">Danh mục sản phẩm</h3>

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
                                    <th>Tên danh mục</th>
                                    <th>Mục cha</th>
                                    <th>Thời gian</th>
                                    <th>Dộ sâu</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                   <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->parent_id }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->depth }}</td>
                                        <td>
                                            <a href="{{ route('backend.category.show', $category->id) }}" class="btn btn-info">Detail</a>
                                            <a href="{{ route('backend.category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                            <form style="display: inline-block;" action="{{ route('backend.category.destroy', $category->id) }}" method="post" accept-charset="utf-8">
                                               @csrf
                                               {{method_field('delete')}}
                                               <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {!! $categories->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
@endsection
