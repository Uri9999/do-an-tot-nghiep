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
                    <h1 class="m-0">List Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('couponCreate') }}"></a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('adminDashboard') }}">Home</a></li>
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
                        <th class="list-name">Name</th>
                        <th class="list-name">Email</th>
                        <th class="list-name">Message</th>
                        <th class="list-name">Created At</th>
                        <th class="list-name">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $key => $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ Carbon\Carbon::parse($contact->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('contactDelete', $contact->id) }}">
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
