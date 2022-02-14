@extends('user-.layout')
@section('css')
<link rel="stylesheet" href="{{ url('css/user/checkout.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="special-deal leftbar" style="margin-top:0;">
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
                                {{ $product->prod_price }}
                            </h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <div class="checkout-page">
                <ol class="checkout-steps">
                    <li class="steps active">
                        <a href="#" class="step-title">
                            Checkout
                        </a>
                        <div class="step-description">
                            <div class="row">
                                <div>Total price: </div>
                                {{-- <div class="col-md-6 col-sm-6">
                                    <div class="new-customer">
                                        <h5>
                                            New Customer
                                        </h5>
                                        <label>
                                            <span class="input-radio">
                                                <input type="radio" name="user">
                                            </span>
                                            <span class="text">
                                                I wish to subscribe to the Herbal Store newsletter.
                                            </span>
                                        </label>
                                        <label>
                                            <span class="input-radio">
                                                <input type="radio" name="user">
                                            </span>
                                            <span class="text">
                                                My delivery and billing addresses are the same.
                                            </span>
                                        </label>
                                        <p class="requir">
                                            By creating an account you will be able to shop faste be up to date on an
                                            order's status, and keep track of the orders you have previously made.
                                        </p>
                                        <button>
                                            Continue
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="run-customer">
                                        <h5>
                                            Rerunning Customer
                                        </h5>
                                        <form>
                                            <div class="form-row">
                                                <label class="lebel-abs">
                                                    Email
                                                    <strong class="red">
                                                        *
                                                    </strong>
                                                </label>
                                                <input type="text" class="input namefild" name="">
                                            </div>
                                            <div class="form-row">
                                                <label class="lebel-abs">
                                                    Password
                                                    <strong class="red">
                                                        *
                                                    </strong>
                                                </label>
                                                <input type="text" class="input namefild" name="">
                                            </div>
                                            <p class="forgoten">
                                                <a href="#">
                                                    Forgoten your password?
                                                </a>
                                            </p>
                                            <button>
                                                Login
                                            </button>
                                        </form>
                                    </div>
                                </div> --}}
                                <div class="demo">
                                    <form action="{{ route('userCheckout') }}" method="POST" class="payment-card">
                                        @csrf
                                        <div class="bank-card">
                                            <div class="bank-card__side bank-card__side_front">
                                                <div class="bank-card__inner">
                                                    <label class="bank-card__label bank-card__label_holder">
                                                        <span class="bank-card__hint">Holder of card</span>
                                                        <input type="text" class="bank-card__field" placeholder="Holder of card" pattern="[A-Za-z, ]{2,}" name="holder_card" required>
                                                    </label>
                                                </div>
                                                <div class="bank-card__inner">
                                                    <label class="bank-card__label bank-card__label_number">
                                                        <span class="bank-card__hint">Number of card</span>
                                                        <input type="text" class="bank-card__field" placeholder="Number of card" pattern="[0-9]{16}" name="number_card" required>
                                                    </label>
                                                </div>
                                                <div class="bank-card__inner">
                                                    <span class="bank-card__caption">valid thru</span>
                                                </div>
                                                <div class="bank-card__inner bank-card__footer">
                                                    <label class="bank-card__label bank-card__month">
                                                        <span class="bank-card__hint">Month</span>
                                                        <input type="text" class="bank-card__field" placeholder="MM" maxlength="2" pattern="[0-9]{2}" name="mm_card" required>
                                                    </label>
                                                    <span class="bank-card__separator">/</span>
                                                    <label class="bank-card__label bank-card__year">
                                                        <span class="bank-card__hint">Year</span>
                                                        <input type="text" class="bank-card__field" placeholder="YY" maxlength="2" pattern="[0-9]{2}" name="year_card" required>
                                                    </label>
                                                </div>
                                                @if (Session::has('message'))
                                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                                @endif
                                            </div>
                                            <div class="bank-card__side bank-card__side_back">
                                                <div class="bank-card__inner">
                                                    <label class="bank-card__label bank-card__cvc">
                                                        <span class="bank-card__hint">CVC</span>
                                                        <input type="text" class="bank-card__field" placeholder="CVC" maxlength="3" pattern="[0-9]{3}" name="cvc_card" required>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment-card__footer">
                                            <button class="payment-card__button" type="submit">Checkout</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
