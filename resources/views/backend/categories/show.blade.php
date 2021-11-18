@extends('backend.layouts.master')

@section('content-header')
    <!-- Content Header -->
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Chi tiết danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                        <li class="breadcrumb-item active">Chi tiết danh mục</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 style="font-weight: 550;">
                <p>Id: {{$category->id}}</p>
                <p>Tên danh mục: {{$category->name}}</p>
                <p>Mục cha: {{$category->parent_id}}</p>
                <p>Độ sâu: {{$category->depth}}</p>
                </h3>
            </div>
            <div class="col-lg-6">
                <img src="#" alt="">
            </div>
            <h2 class="col-lg-12">
                <p>Mô tả: {{ $category->content }}</p>
            </h2>
        </div>
    </div>
@endsection
