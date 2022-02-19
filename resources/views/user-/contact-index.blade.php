@extends('user-.layout')
@section('css')
    {{-- <link href="{{ url('css/user/index.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="title contact-title">
                    Contact Us
                </h5>
                <div class="clearfix">
                </div>
                <div class="map">
                    <iframe width="600" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.28877810786!2d105.78704891430725!3d20.981058294782386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acce612c766f%3A0xf1fff967689168e!2zxJDhuqFpIEjhu41jIEtp4bq_biBUcsO6YyAtIFRy4bqnbiBQaMO6IChIw6AgxJDDtG5nKQ!5e0!3m2!1sen!2s!4v1645238236339!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="clearfix">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-infoormation">
                            <h5>
                                Contact Info
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur ad ipis cing elit. Suspendisse at sapien mascsa.
                                Lorem ipsum dolor sit amet, consectetur se adipiscing elit. Sed fermentum, sapien scele
                                risque volutp at tempor, lacus est sodales massa, a hendrerit dolor slase turpis non mi.
                            </p>
                            <ul>
                                <li>
                                    <span class="icon">
                                        <img src="images/message.png" alt="">
                                    </span>
                                    <p>
                                        contact@michaeldesign.me
                                        <br>
                                        support@michaeldesign.me
                                    </p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <img src="images/phone.png" alt="">
                                    </span>
                                    <p>
                                        084. 93 668 2236
                                        <br>
                                        084. 93 668 6789
                                    </p>
                                </li>
                                <li>
                                    <span class="icon">
                                        <img src="images/address.png" alt="">
                                    </span>
                                    <p>
                                        No.86 ChuaBoc St, DongDa Dt,
                                        <br>
                                        Hanoi, Vietnam
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ContactForm">
                            <h5>
                                Contact Form
                            </h5>
                            <form method="post" action="{{ route('userContactStore') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            Your Name
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input class="inputfild" type="text" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            Your Email
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <input class="inputfild" type="email" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            Your Message
                                            <strong class="red">
                                                *
                                            </strong>
                                        </label>
                                        <textarea class="inputfild" rows="8" name="message"></textarea>
                                    </div>
                                </div>
                                <button class="pull-right" type='submit'>
                                    Send Message
                                </button>
                            </form>
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
<script>
    $('.layout-menu').removeClass('active');
    $('.layout-contact').addClass('active');
</script>
@endsection
