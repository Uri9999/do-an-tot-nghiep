@extends('user-.layout')
@section('css')
    {{-- <link href="{{ url('css/user/index.css') }}" rel="stylesheet"> --}}
    <style>
        table {
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                    List Coupon
                </h3>
                <div class="clearfix">
                </div>
                @if (count($coupons) == 0)
                    <div class="text-align:center;">
                        <h3>There are no coupon</h3>
                    </div>
                @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Coupon Code</th>
                            <th scope="col">Coupon Value</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Expired Date</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->coupon_code }}</td>
                                <td>{{ $item->coupon_value }} %</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ Carbon\Carbon::parse($item->expired_date)->format("Y-m-d") }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
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
                                <a href="{{ route('userGetCart') }}">
                                    <button class=" pull-right">
                                        Back to cart
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
