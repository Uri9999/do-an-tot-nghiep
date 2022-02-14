@extends('user-.layout')
@section('content')
    <div class="container shopping-cart">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                    Shopping Cart
                </h3>
                <div class="clearfix">
                </div>
                <div class="text-align:center;">
                    <h3>There are no products in the cart</h3>
                </div>
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
                                Price
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <template x-for="(item, itemIndex) in items"> --}}
                        @foreach ($cart as $item)
                            <tr>
                                <td>
                                    <img alt="Product Name" style="max-height: 130px;"
                                        src="{{ url('profile_images/') . '/' . $item->product->prod_img }}">
                                </td>
                                <td>
                                    <div class="shop-details">
                                        <div class="productname">
                                            {{ $item->product->prod_name }}
                                        </div>
                                        <p>
                                            <img alt="" src="{{ url('user/images/star.png') }}">
                                            <a class="review_num" href="#">
                                                02 Review(s)
                                            </a>
                                        </p>
                                        <div class="color-choser">
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
                                        </div>
                                        <p>
                                            Product Code :
                                            <strong class="pcode">
                                                {{ $item->product->id }}
                                            </strong>
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <h5>
                                        {{ $item->product->prod_price }}
                                    </h5>
                                </td>
                                <input type="hidden" name="price" value="{{ $item->product->prod_price }}">
                                <td>
                                    {{-- <select name="quantiry" @change="updatePrice($event.target.options[$event.target.selectedIndex], itemIndex)">
                                        <template x-for="(item, itemIndex) in quantityNumber">
                                            <option :value="item" x-text="item">
                                            </option>
                                        </template>
                                    </select> --}}
                                    <input class="form-control text-center align-middle quantity" value="1" type="number"
                                        name="quantity-detail" min="1">
                                </td>
                                <td class="subtotal-cart">
                                    <h5>
                                        <strong class="red">
                                            {{ $item->product->prod_price }}
                                        </strong>
                                    </h5>
                                </td>
                                <input type="hidden" name="subPrice" value="{{ $item->product->prod_price }}">
                                <td>
                                    <a href="#" @click.prevent="removeCart(item.id)">
                                        <img src="{{ url('user/images/remove.png') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        {{-- </template> --}}
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <td colspan="6">
                                <button class="pull-left">
                                    Continue Shopping
                                </button>
                                <button class=" pull-right">
                                    Update Shopping Cart
                                </button>
                            </td>
                        </tr>
                    </tfoot> --}}
                </table>
                <div class="clearfix">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="shippingbox">
                            <h5>
                                Discount Codes
                            </h5>
                            <form>
                                <label>
                                    Enter your coupon code if you have one
                                </label>
                                <input type="text" name="">
                                <div class="clearfix">
                                </div>
                                <button>
                                    Get A Qoute
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="shippingbox">
                            <div class="subtotal">
                                <h5>
                                    Sub Total
                                </h5>
                                <span>
                                    $1.000.00
                                </span>
                            </div>
                            <div class="grandtotal">
                                <h5>
                                    GRAND TOTAL
                                </h5>
                                <span>
                                    $1.000.00
                                </span>
                            </div>
                            <button>
                                Process To Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/user/cart.js') }}"></script>
@endsection
