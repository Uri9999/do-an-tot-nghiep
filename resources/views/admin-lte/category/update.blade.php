@extends('admin-lte.layout')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="{{ url('css/admin-lte/user.css') }}"> --}}
@endsection
@section('content-manager')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('categoryList') }}">List category</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('categoryUpdate', $category->id) }}" method="POST" class="w-50">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category name:</label>
                    <input type="text" class="form-control 
                    @error('cate_name') is-invalid @enderror"
                        name="cate_name" 
                        @error('cate_name')
                            value="{{ old('cate_name') }}"
                        @enderror
                        value="{{ $category->cate_name }}" 
                        id="exampleFormControlInput1"
                        placeholder="Category name">
                    @error('cate_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
@endsection
