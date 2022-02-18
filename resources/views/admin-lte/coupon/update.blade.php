@extends('admin-lte.layout')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content-manager')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('couponList') }}">List Coupon</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('couponStore') }}" method="POST" class="w-50">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Coupon code:</label>
                    <input type="text" class="form-control 
                    @error('coupon_code') is-invalid @enderror"
                        @error('coupon_code')
                            value="{{ old('coupon_code') }}"
                        @enderror
                        value="{{ $coupon->coupon_code }}"
                        name="coupon_code" 
                        id="exampleFormControlInput1"
                        placeholder="Coupon code">
                    @error('coupon_code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Coupon value:</label>
                    <input type="number" min="1" max="100" class="form-control 
                    @error('coupon_value') is-invalid @enderror"
                        @error('coupon_value')
                            value="{{ old('coupon_value') }}"
                        @enderror
                        value="{{ $coupon->coupon_value }}"
                        name="coupon_value" 
                        id="exampleFormControlInput1"
                        placeholder="Coupon value">
                    @error('coupon_value')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity:</label>
                    <input type="number" class="form-control 
                    @error('quantity') is-invalid @enderror"
                        @error('quantity')
                            value="{{ old('quantity') }}"
                        @enderror
                        value="{{ $coupon->quantity }}"
                        name="quantity" 
                        id="exampleFormControlInput1"
                        placeholder="Quantity">
                    @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Expired date:</label>
                    <input type="date" class="form-control 
                    @error('expired_date') is-invalid @enderror"
                        @error('expired_date')
                            value="{{ old('expired_date') }}"
                        @enderror
                        value="{{ Carbon\Carbon::parse($coupon->expired_date)->format('m/d/Y') }}"
                        name="expired_date" 
                        id="exampleFormControlInput1"
                        placeholder="Expired date">
                    @error('expired_date')
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
