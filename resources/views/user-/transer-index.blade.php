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
                    Order History
                </h3>
                <div class="clearfix">
                </div>
                @if (count($transfers) == 0)
                    <div class="text-align:center;">
                        <h3>There are no order</h3>
                    </div>
                @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Coupon Code</th>
                            <th scope="col">Coupon Value</th>
                            <th scope="col">Actual Price</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transfers as $key => $transfer)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $transfer->total_price }} $</td>
                                <td>{{ $transfer->coupon_code }}</td>
                                @if (isset($transfer->coupon_value))
                                    <td>{{ $transfer->coupon_value }} %</td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $transfer->actual_price }} $</td>
                                <td>{{ Carbon\Carbon::parse($transfer->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('userTransferDetail', $transfer->id) }}">
                                        <button type="button" class="btn btn-primary">Detail</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
@endsection
