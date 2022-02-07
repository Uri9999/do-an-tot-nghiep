@extends('user.master')
@section('js')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
@section('main')

    <div class="main">
        <div class="ctn">
            <div class="table">
                <div class="table-right"></div>
                <div class="table-left">
                    <h2>My Cart</h2>
                    <div class="container">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Tên sản phẩm</th>
                                    <th style="width:10%">Giá</th>
                                    <th style="width:8%">Số lượng</th>
                                    <th style="width:22%" class="text-center">Thành tiền</th>
                                    <th style="width:10%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img
                                                        src="{{ url('profile_images' . '/' . $cart->product->prod_img) }}"
                                                        alt="Sản phẩm 1" class="img-responsive" width="100">
                                                </div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $cart->product->prod_name }}</h4>
                                                    <p>Mô tả của sản phẩm 1</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price" class="align-middle">
                                            {{ number_format($cart->product->prod_price, 0, ',', '.') }}đ
                                        </td>
                                        <input type="hidden" name="price" value="{{ $cart->product->prod_price }}">
                                        <td data-th="Quantity" class="align-middle"><input class="form-control text-center align-middle quantity" value="1"
                                            type="number" min="1">
                                        </td>
                                        <td data-th="Subtotal" class="text-center align-middle subtotal">
                                            {{ number_format($cart->product->prod_price, 0, ',', '.') }}đ</td>
                                        <input type="hidden" name="subPrice" value="{{ $cart->product->prod_price }}">
                                        <td class="actions align-middle" data-th="">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <a href="{{ route('deleteCart', [$cart->id]) }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><a href="http://hocwebgiare.com/" class="btn btn-warning"><i
                                                class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                                    </td>
                                    <td colspan="2" class="hidden-xs"> </td>
                                    <td class="hidden-xs text-center"><strong>Tổng tiền <span class="total-price"></span> đ</strong>
                                    </td>
                                    <td><a href="http://hocwebgiare.com/" class="btn btn-success btn-block">Thanh toán
                                            <i class="fa fa-angle-right"></i></a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
