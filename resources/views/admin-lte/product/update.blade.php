@extends('admin-lte.layout')
@section('css')
@endsection
@section('content-manager')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('productCreate') }}">Create product</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('productUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product name:</label>
                    <input type="text" class="form-control @error('prod_name') is-invalid @enderror" 
                        name="prod_name"
                        @error('prod_name')
                            value="{{ old('prod_name') }}"
                        @enderror
                        value="{{ $product->prod_name }}"
                        id="exampleFormControlInput1"
                        placeholder="Product name">
                    @error('prod_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product price:</label>
                    <input type="text" class="form-control @error('prod_price') is-invalid @enderror" 
                        name="prod_price" id="exampleFormControlInput1"
                        @error('prod_price')
                            value="{{ old('prod_price') }}"
                        @enderror
                        value="{{ $product->prod_price }}"
                        placeholder="Product price">
                    @error('prod_price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Product image 1:</label>
                    <input type="file" 
                        class="form-control-file @error('prod_img') is-invalid @enderror" 
                        @error('prod_price')
                            value="{{ old('prod_price') }}"
                        @enderror
                        value="{{ $product->prod_price }}"
                        name="prod_img" id="exampleFormControlFile1">
                    @error('prod_img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product status: </label>
                    <select class="form-control @error('status') is-invalid @enderror" 
                        @error('status') value="{{ old('featured') }}" @enderror
                        value="{{ $product->status }}"
                        name="status" id="exampleFormControlSelect1">
                        <option value="1" @if($product->status == 1) selected @endif>Stock</option>
                        <option value="2" @if($product->status == 2) selected @endif>Out of stock</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product special: </label>
                    <select class="form-control @error('featured') is-invalid @enderror" 
                        @error('category_id') value="{{ old('featured') }}" @enderror
                        value="{{ $product->featured }}"
                        name="featured" id="exampleFormControlSelect1">
                            <option value="1" @if($product->featured == 1) selected @endif>Yes</option>
                            <option value="2" @if($product->featured == 2) selected @endif>No</option>
                        <option value="2" @if(true) checked @endif>No</option>
                    </select>
                    @error('featured')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category:</label>
                    <select multiple class="form-control @error('category_id') is-invalid @enderror" 
                        @error('category_id') value="{{ old('category_id') }}" @enderror
                        value="{{ $product->category_id }}"
                        name="category_id" id="exampleFormControlSelect2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->cate_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group card-body p-0">
                    <label for="summernote">Description:</label>
                    <textarea id="summernote" 
                        class="@error('prod_description') is-invalid @enderror" name="prod_description">
                        {{ $product->prod_description }}
                    </textarea>
                    @error('prod_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endsection
