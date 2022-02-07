@extends('user.master')
    @section('main')

    <!-- search -->
    <div class="search-product">
    search
    <div>
            @foreach($products as $product)
                {{$product->prod_name}}

            @endforeach
    </div>
   
    </div>
   


    @endsection