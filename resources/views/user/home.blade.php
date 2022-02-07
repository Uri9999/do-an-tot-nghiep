@extends('user.master')
@section('main')
    <!-- main -->
    <div class="main">
        <div class="ctn">
            <div class="main1">
                <div class="main1-left">
                    <div class="front">
                        <img src="{{url('css/frontend-css')}}/img_psd/sale.jpg" style="width: 300" alt="">
                    </div>
                    <div class="back">
                        <div class="back-content middle">
                            <h3>Featured store</h3>
                            <p><a href="#">Go to Shop</a></p>
                            <div class="icon">
                                <a href="https://www.facebook.com/profile.php?id=100018846967102"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-facebook-messenger"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main1-right">
                    <div class="slide" id="slide">
                        <div class="move">
                            <i class="fas fa-chevron-left" onclick="back()"></i>
                            <i class="fas fa-chevron-right" onclick="next()"></i>
                        </div>
                        
                        <div class="move-slide">
                            <a href="#"><img src="{{url('css/frontend-css')}}/img_psd/bg-1.jpg"></a>
                            <a href="#"><img src="{{url('css/frontend-css')}}/img_psd/bg-4.jpeg"></a>
                            <a href="#"><img src="{{url('css/frontend-css')}}/img_psd/bg-3.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            dots:false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
    </script>
    <div class="con">
        <div class="category-prod">
            <h2>San pham khuyen mai</h2>
        </div>
        <div class="owl-carousel owl-theme" id="owl1">
            @foreach($featured as $item)
            <div class="item">
                <div>
                    <div class="top">
                        <div class="img">
                            <a href="{{ route('getDetail' ,$item->id) }}">
                                <img src="{{ url('profile_images'.'/'.$item->prod_img) }}" alt="">
                            </a>
                        </div>
                        <div class="quick-view">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <a href="{{ route('getDetail' ,$item->id) }}"><i class="fas fa-eye"></i><span>{{$item->view_count}}</span></a>
                            <a href="{{ route('getDetail' ,$item->id) }}"><i class="fas fa-search"></i></a>
                        </div>
                        <div class="add-to-cart">
                            <a href="{{route('addCart', $item->id)}}"><span><i class="fas fa-cart-arrow-down"></i></span>Them vao gio hang</a>
                        </div>
                    </div>
                    <div class="product-name">
                        <a href="{{ route('getDetail' ,$item->id) }}">{{$item->prod_name}}</a>
                        <span>{{number_format($item->prod_price,0,',','.')}}<sup>đ</sup></span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
   <!-- sp -->

   <div class="product-detail">
       <div class="cate">
           <div class="cate-left">
               <span><i class="fas fa-align-right"></i></span>
               <h2>Máy tính</h2>
               <span><i class="fas fa-angle-double-right"></i></span>
            </div>
           <div class="cate-right">
               {{-- <ul>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
                   <li><a href="#">ao so mi </a></li>
               </ul> --}}
           </div>
       </div>
       <div class="detail">
           <div class="category">
            Tính năng lọc sản phẩm 
                {{-- <ul>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                    <li><a href="#">ao so mi </a></li>
                </ul> --}}
           </div>
            
            <div class="prod-cate">
            @foreach($cate_1 as $item)
                <div>
                    <div class="prod-top">
                        <div>
                            <a href="{{ route('getDetail', $item->id) }}">
                                <img src="{{ url('profile_images'.'/'.$item->prod_img) }}" alt="">
                            </a>
                        </div>
                        <div class="quick">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <a href="#"><i class="fas fa-eye"></i><span>{{$item->view_count}}</span></a>
                            <a href="{{ route('getDetail', $item->id) }}"><i class="fas fa-search"></i></a>
                        </div>
                        <div class="cart">
                            <a href="{{route('addCart', $item->id)}}"><span><i class="fas fa-cart-arrow-down"></i></span>Thêm Vào Giỏ Hàng</a>
                        </div>
                    </div>
                    <div class="name">
                        <a href="{{ route('getDetail', $item->id) }}">{{$item->prod_name}}</a>
                        <span>{{number_format($item->prod_price,0,',','.')}}<sup>đ</sup></span>
                    </div>
                </div>
            @endforeach
            </div>
       </div>
   </div>

   <div class="product-detail">
    <div class="cate">
        <div class="cate-left">
            <span><i class="fas fa-align-right"></i></span>
            <h2>Điện thoại</h2>
            <span><i class="fas fa-angle-double-right"></i></span>
         </div>
        <div class="cate-right">
            {{-- <ul>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
            </ul> --}}
        </div>
    </div>
    <div class="detail">
        <div class="category">
            Tính năng lọc sản phẩm 
             {{-- <ul>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
             </ul> --}}
        </div>
         
         <div class="prod-cate">
         @foreach($cate_2 as $item)
             <div>
                 <div class="prod-top">
                     <div>
                         <a href="{{route('getDetail', $item->id)}}">
                            <img src="{{ url('profile_images'.'/'.$item->prod_img) }}" alt="">
                         </a>
                     </div>
                     <div class="quick">
                         <a href="#"><i class="far fa-heart"></i></a>
                         <a href="#"><i class="fas fa-eye"></i><span>{{$item->view_count}}</span></a>
                         <a href="{{route('getDetail', $item->id)}}"><i class="fas fa-search"></i></a>
                     </div>
                     <div class="cart">
                         <a href="{{route('addCart', $item->id)}}"><span><i class="fas fa-cart-arrow-down"></i></span>Thêm Vào Giỏ Hàng</a>
                     </div>
                 </div>
                 <div class="name">
                     <a href="{{route('getDetail', $item->id)}}">{{$item->prod_name}}</a>
                     <span>{{number_format($item->prod_price,0,',','.')}}<sup>đ</sup></span>
                 </div>
             </div>
        @endforeach
         </div>
    </div>
</div>
<div class="product-detail">
    <div class="cate">
        <div class="cate-left">
            <span><i class="fas fa-align-right"></i></span>
            <h2>Bàn phím</h2>
            <span><i class="fas fa-angle-double-right"></i></span>
         </div>
        <div class="cate-right">
            {{-- <ul>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
                <li><a href="#">ao so mi </a></li>
            </ul> --}}
        </div>
    </div>
    <div class="detail">
        <div class="category">
             {{-- <ul>
                 <li><Tính năng lọc sản phẩm a href="#">ao so mi </Tính></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
                 <li><a href="#">ao so mi </a></li>
             </ul> --}}
             Tính năng lọc sản phẩm 
        </div>
         
         <div class="prod-cate">
         @foreach($cate_3 as $item)
             <div>
                 <div class="prod-top">
                     <div>
                         <a href="{{route('getDetail', $item->id)}}">
                             <img src="{{ url('profile_images'.'/'.$item->prod_img) }}" alt="">
                         </a>
                     </div>
                     <div class="quick">
                         <a href="#"><i class="far fa-heart"></i></a>
                         <a href="#"><i class="fas fa-eye"></i><span>{{$item->view_count}}</span></a>
                         <a href="{{route('getDetail', $item->id)}}"><i class="fas fa-search"></i></a>
                     </div>
                     <div class="cart">
                         <a href="{{route('addCart', $item->id)}}"><span><i class="fas fa-cart-arrow-down"></i></span>Thêm Vào Giỏ Hàng</a>
                     </div>
                 </div>
                 <div class="name">
                     <a href="{{route('getDetail', $item->id)}}">{{$item->prod_name}}</a>
                     <span>{{number_format($item->prod_price,0,',','.')}}<sup>đ</sup></span>
                 </div>
             </div>
        @endforeach
         
         </div>
    </div>
</div>

@endsection