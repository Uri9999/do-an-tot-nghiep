@extends('user.master')
@section('style')
<link rel="stylesheet" href="{{url('css/frontend-css')}}/contact.css">
@endsection
@section('main')
<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-2 d-block">
        <h1 class="text-center mt-3 mb-3">Liên hệ với chúng tôi</h1>
        <div class="row">
            <div class="col col-md-6">
                <img src="{{url('css/frontend-css')}}/img_psd/marketing-1.png">
            </div>
            <div class="col col-md-6">
                <form method="post" action="https://nentang.vn/">
                    <div class="form-group">
                        <label for="email">Email của bạn</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Email của bạn">
                    </div>
                    <div class="form-group">
                        <label for="title">Tiêu đề của bạn</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Tiêu đề của bạn">
                    </div>
                    <div class="form-group">
                        <label for="message">Lời nhắn của bạn</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary" name="btnGoiLoiNhan">Gởi lời nhắn</button>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7235485722294!2d105.78061631523369!3d10.039656175103817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1556697525436!5m2!1svi!2s"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <!-- End block content -->
</main>
@endsection