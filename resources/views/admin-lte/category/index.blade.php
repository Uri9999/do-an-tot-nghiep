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
                        <th class="list-name">Name</th>
                        <th class="list-product">Quantity Product</th>
                        <th class="list-create">Created at</th>
                        <th class="list-update">Updated at</th>
                        <th class="list-action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->cate_name }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td>{{ Carbon\Carbon::parse($category->created_at)->format('Y-m-d') }}</td>
                            <td>{{ Carbon\Carbon::parse($category->updated_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('categoryEdit', $category->id) }}">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </a>
                                <a href="{{ route('categoryDelete', $category->id) }}">
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
            // $('#users-table thead tr')
            //     .clone(true)
            //     .addClass('filters')
            //     .appendTo('#users-table thead');

            $('#users-table').DataTable({
                pageLength: 10,
                orderCellsTop: true,
                fixedHeader: true,
                // initComplete: function() {
                //     var api = this.api();
                //     console.log(api);
                //     // For each column
                //     api.columns()
                //         .eq(0)
                //         .each(function(colIdx) {
                //             // Set the header cell to contain the input element
                //             var cell = $('.filters th').eq(
                //                 $(api.column(colIdx).header()).index()
                //             );
                //             var title = $(cell).text();
                //             $(cell).html('<input type="text" placeholder="' + title + '" />');

                //             // On every keypress in this input
                //             $(
                //                     'input',
                //                     $('.filters th').eq($(api.column(colIdx).header()).index())
                //                 )
                //                 .off('keyup change')
                //                 .on('keyup change', function(e) {
                //                     e.stopPropagation();

                //                     // Get the search value
                //                     $(this).attr('title', $(this).val());
                //                     var regexr =
                //                     '({search})'; //$(this).parents('th').find('select').val();

                //                     var cursorPosition = this.selectionStart;
                //                     // Search the column for that value
                //                     api
                //                         .column(colIdx)
                //                         .search(
                //                             this.value != '' ?
                //                             regexr.replace('{search}', '(((' + this.value +
                //                                 ')))') :
                //                             '',
                //                             this.value != '',
                //                             this.value == ''
                //                         )
                //                         .draw();

                //                     $(this)
                //                         .focus()[0]
                //                         .setSelectionRange(cursorPosition, cursorPosition);
                //                 });
                //         });
                // },
            });
        });
    </script>
@endsection
