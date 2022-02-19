@extends('user-.layout')
@section('css')
<link href="{{ url('css/user/detail.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="products-details">
                <div class="preview_image">
                    <div class="preview-small" style="text-align: center">
                        {{-- <img id="zoom_03" src="{{ url('user/images/products/medium/products-01.jpg') }}" --}}
                        <img id="zoom_03" style="max-width: 210px;"
                            src="{{ url('profile_images/') . '/' . $product->prod_img }}"
                            data-zoom-image="images/products/Large/products-01.jpg" alt="">
                    </div>
                    <div class="thum-image">
                        <ul id="gallery_01" class="prev-thum">
                            <li>
                                <a href="#" data-image="images/products/medium/products-03.jpg"
                                    data-zoom-image="images/products/Large/products-03.jpg">
                                    <img src="images/products/thum/products-03.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#" data-image="images/products/medium/products-03.jpg"
                                    data-zoom-image="images/products/Large/products-03.jpg">
                                    <img src="images/products/thum/products-03.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#" data-image="images/products/medium/products-04.jpg"
                                    data-zoom-image="images/products/Large/products-04.jpg">
                                    <img src="images/products/thum/products-04.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#" data-image="images/products/medium/products-05.jpg"
                                    data-zoom-image="images/products/Large/products-05.jpg">
                                    <img src="images/products/thum/products-05.png" alt="">
                                </a>
                            </li>
                        </ul>
                        <a class="control-left" id="thum-prev" href="javascript:void(0);">
                            <i class="fa fa-chevron-left">
                            </i>
                        </a>
                        <a class="control-right" id="thum-next" href="javascript:void(0);">
                            <i class="fa fa-chevron-right">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="products-description">
                    <form action="{{ route('userAddCart') }}" method="post">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        @csrf
                        <h5 class="name">
                            {{ $product->prod_name }}
                        </h5>
                        <p>
                            <img alt="" src="images/star.png">
                            <a class="review_num" href="#">
                                02 Review(s)
                            </a>
                        </p>
                        <p>
                            Availability:
                            @if ($product->status == 1)
                                <span class=" light-red">
                                    In Stock
                                </span>
                            @else
                                <span class=" light-red">
                                    Out of stock
                                </span>
                            @endif
                        </p>
                        <p>
                            {{ $product->prod_description }}
                            Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                            Vestibulum
                            ante ipsum primis in faucibus orci luctus et ultrie ces posuere cubilia curae. Proin lectus
                            ipsum,
                            gravida etds mattis vulps utate, tristique ut lectus. Sed et lorem nunc...
                        </p>
                        <hr class="border">
                        <div class="price">
                            Price :
                            <span class="new_price">
                                {{ number_format($product->prod_price, 0, ',', '.') }}
                                <sup>
                                    $
                                </sup>
                            </span>
                        </div>
                        <hr class="border">
                        <div class="wided">
                            <div class="qty">
                                Qty &nbsp;&nbsp;:
                                <select name="quantity_detail">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="button_group">
                                <button type="submit" class="button">
                                    Add To Cart
                                </button>
                                <button class="button favorite">
                                    <i class="fa fa-heart-o">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix">
                    </div>
                    <hr class="border">
                    <img src="{{ url('user/images/share.png') }}" alt="" class="pull-right">
                </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="tab-box">
                <div id="tabnav">
                    <ul>
                        <li>
                            <a href="#Descraption">
                                DESCRIPTION
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#Reviews">
                                REVIEW
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="#tags">
                                PRODUCT TAGS
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="tab-content-wrap">
                    <div class="tab-content" id="Descraption">
                        <p>
                            Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean
                            eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.
                            Sed et lorem nunc. Vestibu um ante ipsum primis in faucibus orci luctus et ultri ces posuere
                            cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate,
                            tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et
                            ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et
                            mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in
                            faucibus orci luctus et ultri ces posuere cubilia curae...
                        </p>
                        <p>
                            Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean
                            eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.
                            Sed et lorem nunc. Vestibu um ante ipsum primis in faucibus orci luctus et ultri ces posuere
                            cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate,
                            tristique ut lectus. Sed et lorem nunc...
                        </p>
                    </div>
                    <div class="tab-content" id="Reviews">
                        <form>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            &nbsp;
                                        </th>
                                        <th>
                                            1 star
                                        </th>
                                        <th>
                                            2 stars
                                        </th>
                                        <th>
                                            3 stars
                                        </th>
                                        <th>
                                            4 stars
                                        </th>
                                        <th>
                                            5 stars
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Quality
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="Blue" />
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="quality" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Price
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="price" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Value
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                        <td>
                                            <input type="radio" name="value" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Your Name
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input type="text" name="" class="input namefild">
                                    </div>
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Your Email
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input type="email" name="" class="input emailfild">
                                    </div>
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Summary of You Review
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input type="text" name="" class="input summeryfild">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-row">
                                        <label class="lebel-abs">
                                            Your Name
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <textarea class="input textareafild" name="" rows="7">
                            </textarea>
                                    </div>
                                    <div class="form-row">
                                        <input type="submit" value="Submit" class="button">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-content">
                        <div class="review">
                            <p class="rating">
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star-half-o gray">
                                </i>
                                <i class="fa fa-star-o gray">
                                </i>
                            </p>
                            <h5 class="reviewer">
                                Reviewer name
                            </h5>
                            <p class="review-date">
                                Date: 01-01-2014
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien
                                est, malesuada non interdum id, cursus vel neque.
                            </p>
                        </div>
                        <div class="review">
                            <p class="rating">
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star light-red">
                                </i>
                                <i class="fa fa-star-half-o gray">
                                </i>
                                <i class="fa fa-star-o gray">
                                </i>
                            </p>
                            <h5 class="reviewer">
                                Reviewer name
                            </h5>
                            <p class="review-date">
                                Date: 01-01-2014
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien
                                est, malesuada non interdum id, cursus vel neque.
                            </p>
                        </div>
                    </div>
                    <div class="tab-content" id="tags">
                        <div class="tag">
                            Add Tags :
                            <input type="text" name="">
                            <input type="submit" value="Tag">
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="clearfix">
            </div>
        </div>
        <div class="col-md-3">
            <div class="special-deal leftbar">
                <h4 class="title">
                    Special
                    <strong>
                        Deals
                    </strong>
                </h4>
                @foreach ($specialProducts as $product)
                    <div class="special-item">
                        <div class="product-image">
                            <a href="{{ route('userGetDetail', $product->id) }}">
                                <img style="max-height: 60px;" src="{{ url('profile_images/') . '/' . $product->prod_img }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p>
                                {{ $product->prod_name }}
                            </p>
                            <h5 class="price">
                                {{-- {{ $product->prod_price }} --}}
                                {{ number_format($product->prod_price, 0, ',', '.') }} $
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix">
            </div>
            {{-- <div class="fbl-box leftbar">
                <h3 class="title">
                    Facebook
                </h3>
                <span class="likebutton">
                    <a href="#">
                        <img src="images/fblike.png" alt="">
                    </a>
                </span>
                <p>
                    12k people like Flat Shop.
                </p>
                <ul>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        </a>
                    </li>
                </ul>
                <div class="fbplug">
                    <a href="#">
                        <span>
                            <img src="images/fbicon.png" alt="">
                        </span>
                        Facebook social plugin
                    </a>
                </div>
            </div> --}}
            <div class="clearfix">
            </div>
        </div>
    </div>
@endsection
