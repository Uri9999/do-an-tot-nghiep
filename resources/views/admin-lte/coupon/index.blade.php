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
                    <h1 class="m-0">List Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('couponCreate') }}">Create coupon</a></li>
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
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th class="list-id">Id</th>
                        <th class="list-name">Coupon Code</th>
                        <th class="list-name">Coupon Value</th>
                        <th class="list-name">Quantity</th>
                        <th class="list-name">Expired Date</th>
                        <th class="list-name">Created At</th>
                        <th class="list-name">Updated At</th>
                        <th class="list-name">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->coupon_code }}</td>
                            <td>{{ $coupon->coupon_value }}</td>
                            <td>{{ $coupon->quantity }}</td>
                            <td>{{ Carbon\Carbon::parse($coupon->expired_date)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($coupon->created_at)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($coupon->updated_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('couponEdit', $coupon->id) }}">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </a>
                                <a href="{{ route('couponDelete', $coupon->id) }}">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                pageLength: 10,
                orderCellsTop: true,
                fixedHeader: true,
            });
        });
    </script>
@endsection
