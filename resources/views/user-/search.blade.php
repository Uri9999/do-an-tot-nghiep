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
                    Search Product
                </h3>
                <div class="clearfix">
                </div>
                @if (count($products) == 0)
                    <div class="text-align:center;">
                        <h3>There are no products</h3>
                    </div>
                @endif
                @if (count($products) > 0)
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
                                    Category
                                </th>
                                <th>
                                    Code
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <template x-for="(item, itemIndex) in items"> --}}
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('userGetDetail', $product->id) }}">
                                            <img alt="Product Name" style="max-height: 130px;"
                                            src="{{ url('profile_images/') . '/' . $product->prod_img }}">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="shop-details">
                                            <div class="productname">
                                                Product Name: {{ $product->prod_name }}
                                            </div>
                                            {{-- <p>
                                                <img alt="" src="{{ url('user/images/star.png') }}">
                                                <a class="review_num" href="#">
                                                    02 Review(s)
                                                </a>
                                            </p> --}}
                                            {{-- <div class="color-choser">
                                                <span class="text">
                                                    Product Color :
                                                </span>
                                                <ul>
                                                    <li>
                                                        <a class="black-bg " href="#">
                                                            black
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="red-bg" href="#">
                                                            light red
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                            <p>
                                                Product Code :
                                                <strong class="pcode">
                                                    {{ $product->id }}
                                                </strong>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>
                                            {{-- {{ $item->product->prod_price }} --}}
                                            {{ number_format($product->prod_price, 0, ',', '.') }} $
                                        </h5>
                                    </td>
                                    <td>
                                        <strong class="red" style="font-size: 16px;">
                                            @if ($product->category)
                                                {{ $product->category->cate_name }}
                                            @else
                                            
                                            @endif
                                        </strong>
                                    </td>
                                    <td class="subtotal-cart">
                                        <h5>
                                            <strong class="red">
                                                {{ $product->id }}
                                            </strong>
                                        </h5>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- </template> --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <a href="{{ route('getHomeIndex') }}">
                                        <button class="pull-left">
                                            Back to home
                                        </button>
                                    </a>
                                    <a href="{{ route('userGetCart') }}">
                                        <button class=" pull-right">
                                            My cart
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                @endif
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
