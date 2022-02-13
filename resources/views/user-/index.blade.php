@extends('user-.layout')
@section('css')
<link href="{{ url('css/user/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row" x-data="userIndex">
        <div class="notice d-none">
            <img src="{{ url('images/success.png') }}" alt="">
        </div>
        <div class="col-md-3">
            <div class="category leftbar">
                <h3 class="title" @click="getCatProduct(null)">
                    Categories
                </h3>
                <ul>
                    <template x-for="(category, categoryIndex) in categories">
                        <li>
                            <a href="#"
                                :class="category.id == option.categoryId ? 'color-red' : ''"
                                @click.prevent="getCatProduct(category.id)"
                                x-text="category.cate_name"></a>
                        </li>
                    </template>
                </ul>
            </div>
            <div class="clearfix">
            </div>
            <div class="branch leftbar">
                <h3 class="title">
                    Branch
                </h3>
                <ul>
                    <li>
                        <a href="#">
                            New
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Sofa
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Salon
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            New Trend
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Living room
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Bed room
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
            </div>
            <div class="price-filter leftbar">
                <h3 class="title">
                    Price
                </h3>
                <form class="pricing">
                    <label>
                        $
                        <input type="number">
                    </label>
                    <span class="separate">
                        -
                    </span>
                    <label>
                        $
                        <input type="number">
                    </label>
                    <input type="submit" value="Go">
                </form>
            </div>
            <div class="clearfix">
            </div>
            <div class="clolr-filter leftbar">
                <h3 class="title">
                    Color
                </h3>
                <ul>
                    <li>
                        <a href="#" class="red-bg">
                            light red
                        </a>
                    </li>
                    <li>
                        <a href="#" class=" yellow-bg">
                            yellow"
                        </a>
                    </li>
                    <li>
                        <a href="#" class="black-bg ">
                            black
                        </a>
                    </li>
                    <li>
                        <a href="#" class="pink-bg">
                            pink
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dkpink-bg">
                            dkpink
                        </a>
                    </li>
                    <li>
                        <a href="#" class="chocolate-bg">
                            chocolate
                        </a>
                    </li>
                    <li>
                        <a href="#" class="orange-bg">
                            orange-bg
                        </a>
                    </li>
                    <li>
                        <a href="#" class="off-white-bg">
                            off-white
                        </a>
                    </li>
                    <li>
                        <a href="#" class="extra-lightgreen-bg">
                            extra-lightgreen
                        </a>
                    </li>
                    <li>
                        <a href="#" class="lightgreen-bg">
                            lightgreen
                        </a>
                    </li>
                    <li>
                        <a href="#" class="biscuit-bg">
                            biscuit
                        </a>
                    </li>
                    <li>
                        <a href="#" class="chocolatelight-bg">
                            chocolatelight
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
            </div>
            <div class="product-tag leftbar">
                <h3 class="title">
                    Products
                    <strong>
                        Tags
                    </strong>
                </h3>
                <ul>
                    <li>
                        <a href="#">
                            Lincoln us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            SDress for Girl
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Corner
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Window
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            PG
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Oscar
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Bath room
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            PSD
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">
            </div>
            <div class="others leftbar">
                <h3 class="title">
                    Others
                </h3>
            </div>
            <div class="clearfix">
            </div>
            <div class="others leftbar">
                <h3 class="title">
                    Others
                </h3>
            </div>
            <div class="clearfix">
            </div>
            <div class="fbl-box leftbar">
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
            </div>
            <div class="clearfix">
            </div>
            <div class="leftbanner">
                <img src="{{ url('user/images/banner-small-01.png') }}" alt="">
            </div>
        </div>
        <div class="col-md-9">
            <div class="banner">
                <div class="bannerslide" id="bannerslide">
                    <ul class="slides">
                        <li>
                            <a href="#">
                                <img src="{{ url('user/images/banner-01.jpg') }}" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ url('user/images/banner-02.jpg') }}" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="products-grid">
                <div class="toolbar">
                    <div class="sorter">
                        <div class="view-mode">
                            <a href="#" class="list" :class="type == 2 ? 'active' : ''"
                                @click.prevent="type = 2">
                                List
                            </a>
                            <a href="#" class="grid" :class="type == 1 ? 'active' : ''"
                                @click.prevent="type = 1">
                                Grid
                            </a>
                        </div>
                        <div class="sort-by">
                            Sort by :
                            <select name="" @change="updateKey($event.target.options[$event.target.selectedIndex].value)">
                                <template x-for="(item, itemIndex) in keys">
                                    <option :value="item" x-text="item" :selected="item == option.key">
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="limiter">
                            Show :
                            <select name="take-product"
                                @change="updateTake($event.target.options[$event.target.selectedIndex].value)">
                                <template x-for="(item, takeIndex) in takes">
                                    <option x-text="item" :value="item" :selected="item == option.take">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="pager">
                        <a href="#" class="prev-page" @click.prevent="next()">
                            <i class="fa fa-angle-left">
                            </i>
                        </a>
                        <a href="#" class="active" x-text="currentPage">
                        </a>
                        <a href="#" class="next-page" @click.prevent="previous()">
                            <i class="fa fa-angle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="clearfix">
                </div>
                <div class="row" x-show="type == 1">
                    <template x-for="(product, productIndex) in products">
                        <div class="col-md-4 col-sm-6">
                            <div class="products">
                                <div class="offer" x-show="product.featured == 1">
                                    New
                                </div>
                                <div class="thumbnail">
                                    <a href="details.html">
                                        <img alt="Product Name" style="max-height: 220px;"
                                            :src="'profile_images/' + product.prod_img">
                                    </a>
                                </div>
                                <div class="productname" x-text="product.prod_name">

                                </div>
                                <h4 class="price" x-text="product.prod_price">
                                    $451.00
                                </h4>
                                <div class="button_group">
                                    <button class="button add-cart" type="button" @click="addCart(product.id)">
                                        Add To Cart
                                    </button>
                                    <button class="button compare" type="button">
                                        <i class="fa fa-exchange">
                                        </i>
                                    </button>
                                    <button class="button wishlist" type="button">
                                        <i class="fa fa-heart-o">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="products-list" x-show="type == 2">
                    <ul class="products-listItem">
                        <template x-for="(product, productIndex) in products">
                            <li class="products">
                                <div class="offer" x-show="product.featured == 1">
                                    New
                                </div>
                                <div class="thumbnail">
                                    <img :src="'profile_images/' + product.prod_img" alt="Product Name"
                                        style="max-height: 220px;">
                                </div>
                                <div class="product-list-description">
                                    <div class="productname" x-text="product.prod_name"></div>
                                    <p>
                                        <img src="{{ url('user/images/star.png') }}" alt="">
                                        <a href="#" class="review_num">
                                            02 Review(s)
                                        </a>
                                    </p>
                                    <p>
                                        Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                                        Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                                        Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                                        nunc...
                                    </p>
                                    <div class="list_bottom">
                                        <div class="price">
                                            <span class="new_price" x-text="product.prod_price">
                                                450.00
                                            </span>
                                            <sup>
                                                $
                                            </sup>
                                            <span class="old_price">
                                                450.00
                                                <sup>
                                                    $
                                                </sup>
                                            </span>
                                        </div>
                                        <div class="button_group">
                                            <button class="button" @click="addCart(product.id)">
                                                Add To Cart
                                            </button>
                                            <button class="button compare">
                                                <i class="fa fa-exchange">
                                                </i>
                                            </button>
                                            <button class="button favorite">
                                                <i class="fa fa-heart-o">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="clearfix">
                </div>
                <div class="toolbar">
                    <div class="sorter buttom">
                        <div class="view-mode">
                            <a href="#" class="list" :class="type == 2 ? 'active' : ''"
                                @click.prevent="type = 2">
                                List
                            </a>
                            <a href="#" class="grid" :class="type == 1 ? 'active' : ''"
                                @click.prevent="type = 1">
                                Grid
                            </a>
                        </div>
                        <div class="sort-by">
                            Sort by :
                            <select name="" @change="updateKey($event.target.options[$event.target.selectedIndex].value)">
                                <template x-for="(item, itemIndex) in keys">
                                    <option :value="item" x-text="item" :selected="item == option.key">
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="limiter">
                            Show :
                            <select name="take-product"
                                @change="updateTake($event.target.options[$event.target.selectedIndex].value)">
                                <template x-for="(item, takeIndex) in takes">
                                    <option x-text="item" :value="item" :selected="item == option.take">
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="pager">
                        <a href="#" class="prev-page" @click.prevent="next()">
                            <i class="fa fa-angle-left">
                            </i>
                        </a>
                        <a href="#" x-text="currentPage" class="active">
                        </a>
                        <a href="#" class="next-page" @click.prevent="previous()">
                            <i class="fa fa-angle-right">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ url('js/user/index.js') }}"></script>
@endsection