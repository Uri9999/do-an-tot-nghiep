<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="{{url('css/frontend-css')}}/style.css">
    <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <link rel="stylesheet" href="{{url('css/frontend-css')}}/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('css/frontend-css')}}/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('css/frontend-css')}}/style-detail.css">
    <link rel="stylesheet" href="{{url('css/frontend-css')}}/search.css">
    <link rel="stylesheet" href="{{url('css/frontend-css')}}/style-cart.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{url('css/frontend-css')}}/owlcarousel/owl.carousel.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
    @yield('js')
</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="container ctn">
            <div class="header-left">
                <a href="{{ asset('/user')}}"><img src="{{url('css/frontend-css')}}/img_psd/logo-market.png" alt="logo"></a>
            </div>
            <div class="header-right">
                <div class="header-top">
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">My Cart</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="{{route('logOut')}}">Logout</a></li>
                        @if(Auth::check())
                            <li>
                                <a href="#">User</a>
                                <img src="" alt="">
                            </li>
                        @endif

                    </ul>
                </div>
                <div class="header-bottom">
                    <form action="{{ route('search')}}" method="get">
                        <div class="search">
                            <input type="text" name="key" placeholder="Từ khóa tìm kiếm" name="" id="">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <div class="cart">
                        <div>
                            <a href="{{ route('getCart') }}"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                        <div class="price">
                            <p class="mb-0">total</p>
                            <a href="#">$900.00</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- category -->
<div class="category">
        <div class="ctn ctn-cat">
            <div class="cat-left">
                <ul>
                    <li>
                        <a href="#">categories</a>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{ route('prod-cate', $category->id) }}">{{ $category->cate_name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="cat-right">
                <ul>
                    <li><a href="#">Home page</a></li>
                    <li><a href="#">introduce</a></li>
                    <li><a href="#">product</a></li>
                    <li><a href="#">news</a></li>
                    <li><a href="{{ route('getContact')}}">contact</a></li>
                    <li><a href="#">branch</a></li>
                    <li><a href="#">map</a></li>
                </ul>
            </div>
        </div>
    </div>


@yield('main')




<div class="footer">
   
   <div class="footer-infor">
       <div class="footer-infor1">
           <div><img src="{{url('css/frontend-css')}}/img_psd/logo-market.png" alt=""></div>
           <p>laskdjf ksdkfjsk sdkfjks dsfsdfs df sf </p>
           <ul>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt1.png" alt=""><span>0123 Your City</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt2.png" alt=""><span>(+84) 392128799</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt3.png" alt=""><span>nothing9xhdtk@gmail.com</span></a></li>
           </ul>
       </div>
       <div class="footer-infor2">
           <h2>information</h2>
           <ul>
               <li><a href="#">our story</a></li>
               <li><a href="#">privacy & policy</a></li>
               <li><a href="#">terms & conditions</a></li>
               <li><a href="#">shipping & delivery</a></li>
               <li><a href="#">careers</a></li>
               <li><a href="#">FAQs</a></li>
           </ul>
       </div>
       <div class="footer-infor3">
           <h2>oursocial</h2>
           <ul>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-1.png" alt=""></a><span>google+</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-2.png" alt=""></a><span>pinterest</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-3.png" alt=""></a><span>vimeo</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-4.png" alt=""></a><span>instagram</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-5.png" alt=""></a><span>facebook</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-6.png" alt=""></a><span>twitter</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-7.png" alt=""></a><span>RSS</span></a></li>
               <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-8.png" alt=""></a><span>YouTube</span></a></li>
           </ul>
       </div>
       <div class="footer-infor4">
           <div>
               <h2>opening time</h2>
               <div>
                   <span><img src="{{url('css/frontend-css')}}/img_psd/lg-bt-9.png" alt=""></span>
                   <span>Monday-Friday: 08:30 am - 09:30 pm</span>
                   <span>Sat-Sun: 09:00 am - 10:00 pm</span>

               </div>
           </div>
           <div>
               <h2>payment option</h2>
               <ul>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn1.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn2.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn3.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn4.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn1.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn1.png" alt=""></a></li>
                   <li><a href="#"><img src="{{url('css/frontend-css')}}/img_psd/lg-mn1.png" alt=""></a></li>
               </ul>
           </div>
       </div>
   </div>
</div>
<div class="footer-end">
   <div>
       <ul>
           <li><a href="#">Sitemap</a></li>
           <li><a href="#">Sitemap</a></li>
           <li><a href="#">Sitemap</a></li>
           <li><a href="#">Advance</a></li>
           <li><a href="#">Searchs</a></li>
           <li><a href="#">Contact Us</a></li>
       </ul>
   </div>
   <div>
       <p>&copy; 2020 PSDFreebies.com | All Rights Reserved</p>
   </div>
</div>
<script src="{{url('css/frontend-css')}}/script.js"></script>
</body>
</html>