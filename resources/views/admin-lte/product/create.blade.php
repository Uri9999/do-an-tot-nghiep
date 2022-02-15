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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('productStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product name:</label>
                    <input type="text" class="form-control @error('prod_name') is-invalid @enderror" 
                        name="prod_name"
                        value="{{ old('prod_name') }}"
                        id="exampleFormControlInput1"
                        placeholder="Product name">
                    @error('prod_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    {{-- @if($errors->has('product_name'))
                        <div class="error">{{ $errors->first('product_name') }}</div>
                    @endif --}}
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product price:</label>
                    <input type="text" class="form-control @error('prod_price') is-invalid @enderror" 
                        name="prod_price" id="exampleFormControlInput1"
                        value="{{ old('prod_price') }}"
                        placeholder="Product price">
                    @error('prod_price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Product image 1:</label>
                    <input type="file" 
                        class="form-control-file @error('prod_img') is-invalid @enderror" 
                        value="{{ old('prod_img') }}"
                        name="prod_img" id="exampleFormControlFile1">
                    @error('prod_img')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product status: </label>
                    <select class="form-control @error('status') is-invalid @enderror" 
                        value="{{ old('status') }}"
                        name="status" id="exampleFormControlSelect1">
                        <option value="1" checked>Stock</option>
                        <option value="2">Out of stock</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Product special: </label>
                    <select class="form-control @error('featured') is-invalid @enderror" 
                        value="{{ old('featured') }}"
                        name="featured" id="exampleFormControlSelect1">
                        <option value="1">Yes</option>
                        <option value="2" checked>No</option>
                    </select>
                    @error('featured')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category:</label>
                    <select multiple class="form-control @error('category_id') is-invalid @enderror" 
                        value="{{ old('category_id') }}"
                        name="category_id" id="exampleFormControlSelect2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group card-body p-0">
                    <label for="summernote">Description:</label>
                    <textarea id="summernote" 
                        class="@error('prod_description') is-invalid @enderror" name="prod_description"
                        value="{{ old('prod_description') }}">
                            Description for <em>product</em> <u>text</u> <strong>here</strong><br>
                            A product description is the marketing copy that explains what a product 
                            is and why it’s worth purchasing. The purpose of a product description is 
                            to supply customers with important information about the features and benefits 
                            of the product so they’re compelled to buy.
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
