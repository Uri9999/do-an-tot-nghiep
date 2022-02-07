@extends('user.master')
@section('js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('main')

    <!-- detail -->

    {{-- <div class="detail">
        <div class="detail-top">
            <div class="img-product">
                <img src="{{ url('profile_images') . '/' . $product->prod_img }}" alt="">
            </div>
            <div class="detail-product">
                <h3>Tên Sản Phẩm: {{ $product->prod_name }}</h3>
                <div class="rate">
                    <div class="rating">
                        <div>5.0</div>
                        <div>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="evaluate">
                        <div class="amount">2</div>
                        <div>đánh giá</div>
                    </div>
                    <div class="sold">
                        <div class="amount-sold">4</div>
                        <div>đã bán</div>
                    </div>
                </div>
                <div class="price">{{ number_format($product->prod_price, 0, ',', '.') }}<sup>đ</sup></div>
                <div class="description">Chi tiết: {!! $product->prod_description !!}</div>
                <div class="status">Trạng Thái: @if ($product->status == 1) còn hàng @else hết hàng @endif</div>
                <div class="buy">
                    <a href="{{ route('addCart', $product->id) }}"><i class="fas fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div class="container-fliud">
            <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                action="/php/twig/frontend/giohang/themvaogiohang">
                <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane" id="pic-1">
                                <img src="{{ url('profile_images') . '/' . $product->prod_img }}">
                            </div>
                            <div class="tab-pane" id="pic-2">
                                {{-- <img src="../assets/img/product/samsung-galaxy-tab.jpg"> --}}
                                <img src="{{ url('profile_images') . '/' . $product->prod_img }}">

                            </div>
                            <div class="tab-pane active" id="pic-3">
                                {{-- <img src="../assets/img/product/samsung-galaxy-tab-4.jpg"> --}}
                                <img src="{{ url('profile_images') . '/' . $product->prod_img }}">

                            </div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active">
                                <a data-target="#pic-1" data-toggle="tab" class="">
                                    <img src="{{ url('profile_images') . '/' . $product->prod_img }}">
                                </a>
                            </li>
                            <li class="">
                                <a data-target="#pic-2" data-toggle="tab" class="">
                                    {{-- <img src="../assets/img/product/samsung-galaxy-tab.jpg"> --}}
                                <img src="{{ url('profile_images') . '/' . $product->prod_img }}">

                                </a>
                            </li>
                            <li class="">
                                <a data-target="#pic-3" data-toggle="tab" class="active">
                                    {{-- <img src="../assets/img/product/samsung-galaxy-tab-4.jpg"> --}}
                                <img src="{{ url('profile_images') . '/' . $product->prod_img }}">

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->prod_name }}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">999 reviews</span>
                        </div>
                        <p class="product-description">Màn hình 10.1 inch cảm ứng đa điểm</p>
                        <small class="text-muted">Giá cũ: <s><span>10,990,000.00 vnđ</span></s></small>
                        <h4 class="price">Giá hiện tại: <span>{{ number_format($product->prod_price, 0, ',', '.') }}<sup>đ</sup></span></h4>
                        <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                            <strong>Uy
                                tín</strong>!</p>
                        <h5 class="sizes">sizes:
                            <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                            <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                            <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                            <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                        </h5>
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip"
                                title="Hết hàng"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="form-group">
                            <label for="soluong">Số lượng đặt mua:</label>
                            <input type="number" class="form-control" id="soluong" name="soluong">
                        </div>
                        <div class="action">
                            <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang" href="{{ route('addCart', $product->id) }}">Thêm vào giỏ hàng</a>
                            <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div>
        <h2>Comment-Nhận xét:</h2>
        <div class="form">
            <form action="{{ route('addComment') }}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Content:</td>
                        <td><input type="text" name="content"></td>
                        <td><input type="hidden" name="product_id" value="{{ $product->id }}"></td>
                    </tr>
                    <tr>
                        <input type="submit" value="submit">
                    </tr>
                </table>
            </form>
        </div>
        <h2>Comments list</h2>
        <div class="list-comments">
            @foreach ($comments as $comment)
                <div>
                    <div>khach hang: {{ $comment->user_name }}</div>
                    <div>noi dung : {{ $comment->content }}</div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>



@endsection
