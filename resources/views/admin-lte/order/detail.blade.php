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
                    <h1 class="m-0">Detail Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('orderList') }}">List Order</a></li>
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
                        <th class="list-id">Product Id</th>
                        <th class="list-id">Image</th>
                        <th class="list-name">Product Name/th>
                        <th class="list-name">Price</th>
                        <th class="list-name">Product Quantity</th>
                        <th class="list-name">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfer->carts as $cart)
                        <tr>
                            <td>{{ $cart->product->id }}</td>
                            <td>
                                <img style="max-width: 100px;"
                                    src="{{ url('profile_images' . '/' . $cart->product->prod_img) }}" alt="">
                            </td>
                            <td>{{ $cart->product->prod_name }}</td>
                            <td>{{ $cart->product->prod_price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->total_price }}</td>
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
