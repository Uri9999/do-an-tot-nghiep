@extends('user-.layout')
@section('css')
@endsection
@section('content')
    <div class="row" x-show="screen == 1">
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
            <div class="special-deal leftbar">
                <h4 class="title">
                    Special
                    <strong>
                        Deals
                    </strong>
                </h4>
                <template x-for="(specialProduct, specialIndex) in specialProducts">
                    <div class="special-item">
                        <div class="product-image">
                            <a :href="'home-user/detail/' + specialProduct.id">
                                <img style="max-height: 60px;" 
                                    :src="'profile_images/' + specialProduct.prod_img"
                                    alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p x-text="specialProduct.prod_name">
                            </p>
                            <h5 class="price" x-text="specialProduct.prod_price + ' $'">
                            </h5>
                        </div>
                    </div>
                </template>
            </div>
            <div class="clearfix">
            </div>
            {{-- <div class="price-filter leftbar">
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
            </div> --}}
            <div class="clearfix">
            </div>
            <div class="special-deal leftbar">
                <h4 class="title">
                    Hot
                    <strong>
                        Deals
                    </strong>
                </h4>
                <template x-for="(hotProduct, hotIndex) in hotProducts">
                    <div class="special-item">
                        <div class="product-image">
                            <a :href="'home-user/detail/' + hotProduct.id">
                                <img style="max-height: 60px;" 
                                    :src="'profile_images/' + hotProduct.prod_img"
                                    alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p x-text="hotProduct.prod_name">
                            </p>
                            <h5 class="price" x-text="hotProduct.prod_price + ' $'">
                            </h5>
                        </div>
                    </div>
                </template>
            </div>
            <div class="clearfix">
            </div>
            <div class="leftbanner">
                <img src="{{ url('user/images/1752402843.jpeg') }}" alt="">
            </div>
        </div>
        <div class="col-md-9">
            <div class="banner">
                <div class="bannerslide" id="bannerslide">
                    <ul class="slides">
                        <li>
                            <a href="#">
                                <img style="width: 100%;" src="{{ url('images/banner003.png') }}" alt="" />
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#">
                                <img src="{{ url('user/images/banner-02.jpg') }}" alt="" />
                            </a>
                        </li> --}}
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
                                    Special
                                </div>
                                <div class="thumbnail">
                                    <a :href="'home-user/detail/' + product.id">
                                        <img alt="Product Name" style="max-height: 220px;"
                                            :src="'profile_images/' + product.prod_img">
                                    </a>
                                </div>
                                <div class="productname" x-text="product.prod_name">

                                </div>
                                <h4 class="price" x-text="product.prod_price + ' $'">
                                    $451.00
                                </h4>
                                <div class="button_group">
                                    <button class="button add-cart" type="button" @click="addCart(product.id)">
                                        Add To Cart
                                    </button>
                                    <a :href="'home-user/detail/' + product.id">
                                        <button class="button compare" type="button">
                                            <i class="fa fa-exchange">
                                            </i>
                                        </button>
                                    </a>
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
                                    Special
                                </div>
                                <div class="thumbnail">
                                    <a :href="'home-user/detail/' + product.id">
                                        <img :src="'profile_images/' + product.prod_img" alt="Product Name"
                                            style="max-height: 220px;">
                                    </a>
                                </div>
                                <div class="product-list-description">
                                    <div class="productname" x-text="product.prod_name"></div>
                                    {{-- <p>
                                        <img src="{{ url('user/images/star.png') }}" alt="">
                                        <a href="#" class="review_num">
                                            02 Review(s)
                                        </a>
                                    </p> --}}
                                    <p x-text="product.prod_description">
                                        Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                                        Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                                        Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                                        nunc...
                                    </p>
                                    <div class="list_bottom">
                                        <div class="price">
                                            <span class="new_price" x-text="product.prod_price + ' $'">
                                                450.00
                                            </span>
                                            {{-- <sup>
                                                $
                                            </sup>
                                            <span class="old_price">
                                                450.00
                                                <sup>
                                                    $
                                                </sup>
                                            </span> --}}
                                        </div>
                                        <div class="button_group">
                                            <button class="button" @click="addCart(product.id)">
                                                Add To Cart
                                            </button>
                                            <a :href="'home-user/detail/' + product.id">
                                                <button class="button compare">
                                                    <i class="fa fa-exchange">
                                                    </i>
                                                </button>
                                            </a>
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
    <script>
        $('.layout-menu').removeClass('active');
        $('.layout-home').addClass('active');
    </script>
@endsection
