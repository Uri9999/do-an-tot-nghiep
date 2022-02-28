@extends('user-.layout')
@section('css')
<link href="{{ url('css/user/detail.css') }}" rel="stylesheet">
<style>
    .d-none {
        display: none;
    }
    .d-block {
        display: block;
    }
</style>
@endsection
@section('content')
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                    Detail Order
                </h3>
                <div class="clearfix">
                </div>
                @if (count($transfer->carts) > 0)
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Dtails
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Total Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transfer->carts as $key => $item)
                                <tr>
                                    <td>
                                        <img alt="Product Name" style="max-height: 130px;"
                                            src="{{ url('profile_images/') . '/' . $item->product_img }}">
                                    </td>
                                    <td>
                                        <div class="shop-details">
                                            <div class="productname">
                                                {{ $item->product_name }}
                                            </div>
                                            {{-- <p>
                                                <img alt="" src="{{ url('user/images/star.png') }}">
                                                <a class="review_num" href="#">
                                                    02 Review(s)
                                                </a>
                                            </p> --}}
                                            <p>
                                                Product Code :
                                                <strong class="pcode">
                                                    {{ $item->product_id }}
                                                </strong>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="subtotal-cart">
                                        <h5>
                                            {{ $item->product_price }} $
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            {{ $item->quantity }}
                                        </h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <strong class="red">
                                                {{ $item->total_price }} $
                                            </strong>
                                        </h5>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <a href="{{ route('getHomeIndex') }}">
                                        <button class="pull-left">
                                            Back to home
                                        </button>
                                    </a>
                                    <a href="{{ route('userTransfer') }}">
                                        <button class=" pull-right">
                                            Back to list order
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                @endif
                <div class="clearfix">
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/user/cart.js') }}"></script>
    <script src="{{ url('js/user/coupon.js') }}"></script>
@endsection
