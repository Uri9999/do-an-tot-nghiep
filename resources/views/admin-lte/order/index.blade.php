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
                        <li class="breadcrumb-item"><a href="{{ route('categoryCreate') }}">Create category</a></li>
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
                        <th class="list-name">User Name</th>
                        <th class="list-name">Total Price</th>
                        <th class="list-name">Coupon Code</th>
                        <th class="list-name">Total Discount Amount</th>
                        <th class="list-name">Actual Amount</th>
                        <th class="list-name">Order Date</th>
                        <th class="list-name">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfers as $key => $transfer)
                        <tr>
                            <td>{{ $transfer->id }}</td>
                            <td>{{ $transfer->user->name }}</td>
                            <td>{{ $transfer->total_price }}</td>
                            <td>{{ $transfer->coupon_code }}</td>
                            <td>{{ $transfer->total_discount_amount }}</td>
                            <td>
                                @if ($transfer->total_price - $transfer->total_discount_amount > 0)
                                    {{ $transfer->total_price - $transfer->total_discount_amount }}
                                @else
                                    0
                                @endif
                            </td>
                            <td>{{ Carbon\Carbon::parse($transfer->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('orderDetail', $transfer->id) }}">
                                    <button type="button" class="btn btn-primary">Detail</button>
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
