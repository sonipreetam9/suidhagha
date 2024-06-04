<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Suruchi - Checkout</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/glightbox.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    @php
    $deliveryCharges=0;
    $formattedValue=0;
    @endphp
    @foreach ($carts as $cart )
    @php
    $deliveryCharges=$cart->product->delivery_charges;
    $formattedValue = number_format($deliveryCharges, 2);
    @endphp
    @endforeach
    <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>

                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>

                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>

                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>

                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>

                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>

                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->
    @if ($carts->isNotEmpty())

    <!-- Start checkout page area -->
    {{-- <form action="{{ route('test.req') }}" method="post"> --}}
    <form action="{{ route('add.to.orderItem') }}" method="POST">
        @csrf
        <div class="checkout__page--area">
            <div class="container">
                <div class="checkout__page--inner d-flex">
                    <div class="main checkout__mian">
                        <header class="main__header checkout__mian--header mb-30">
                            <h1 class="main__logo--title"><a class="logo logo__left mb-20"
                                    href="{{ route('home') }}"><img
                                        src="{{ asset('assets/img/logo/sui-dhagha-high-resolution-logo-color-on-transparent-background (1).png') }}"
                                        alt="logo" style="height: 40px"></a></h1>
                            <details class="order__summary--mobile__version">
                                <summary class="order__summary--toggle border-radius-5">
                                    <span class="order__summary--toggle__inner">
                                        <span class="order__summary--toggle__icon">
                                            <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span class="order__summary--toggle__text show">
                                            <span>Show order summary</span>
                                            <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg"
                                                class="order-summary-toggle__dropdown" fill="currentColor">
                                                <path
                                                    d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="order__summary--final__price" id="finalPrice">₹{{ $totalPrice }}</span>
                                    </span>
                                </summary>
                                <div class="order__summary--section">
                                    <div class="cart__table checkout__product--table">
                                        <table class="summary__table">
                                            <tbody class="summary__table--body">
                                                @foreach ($carts as $cart )


                                                <tr class=" summary__table--items">
                                                    <td class=" summary__table--list">
                                                        <div class="product__image two  d-flex align-items-center">
                                                            <div class="product__thumbnail border-radius-5">
                                                                <a
                                                                    href="{{ route('product.detail.page',['id'=>$cart->product->id]) }}"><img
                                                                        class="border-radius-5"
                                                                        src="{{ asset('uploads/Products Images/'.$cart->product->image) }}"
                                                                        alt="cart-product"></a>
                                                                <span class="product__thumbnail--quantity">{{
                                                                    $cart->times }}</span>
                                                            </div>
                                                            <div class="product__description">
                                                                <h3 class="product__description--name h4"><a
                                                                        href="{{ route('product.detail.page',['id'=>$cart->product->id]) }}">{{
                                                                        $cart->product->name }}</a>
                                                                </h3>
                                                                <span class="product__description--variant text-dark"
                                                                    style="text-transform: uppercase;">COLOR: {{
                                                                    $cart->product->colors }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class=" summary__table--list">
                                                        <span class="cart__price text-dark">₹{{
                                                            $cart->product->discounted_price }}</span>
                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                        @php
                                                $deliveryCharge = 0;
                                                if ($totalPrice < 500) {{ $deliveryCharge=$formattedValue; }  } @endphp @if ($deliveryCharge> 0)
                                                    <div>
                                                        <span class="text-left">Delivery Charges</span>
                                                        <span class="text-right">₹{{ $deliveryCharge }}</span>
                                                    </div>
                                                    @else
                                                    <p class="text-success ">Free Delivery</p>
                                                    @endif
                                                    @php
                                                    $finalPrice = $totalPrice + $deliveryCharge;
                                                    @endphp
                                        <p class="text-success">Expected delivery within 5 days.</p>

                                    </div>
                                    {{-- <div class="checkout__discount--code">
                                        <form id="couponForm" action="{{ route('vaild.coupon') }}" method="POST"
                                            class="d-flex">
                                            @csrf
                                            <input type="hidden" name="finalPrice" id="subfinalPrice" value="{{ $finalPrice }}">
                                            <label>
                                                <input class="checkout__discount--code__input--field border-radius-5"
                                                    placeholder="Gift card or discount code" type="text" id="dis" name="code">
                                            </label>
                                            <button class="checkout__discount--code__btn primary__btn border-radius-5"
                                            id="coupon_btn">Apply</button>
                                        </form>
                                        <p class="text-danger d-none" id="errorcoupanmsg">Invaild Coupan Code</p>
                                    </div> --}}
                                    <div class="checkout__total">
                                        <table class="checkout__total--table">
                                            <tbody class="checkout__total--body">
                                                <tr class="checkout__total--items">
                                                    <td class="checkout__total--title text-left">Subtotal </td>
                                                    <td class="checkout__total--amount text-right" id="finalPrice">₹{{ $finalPrice }}
                                                    </td>
                                                </tr>
                                                <tr class="checkout__total--items">
                                                    <td class="checkout__total--title text-left">Shipping</td>
                                                    <td class="checkout__total--calculated__text text-right">₹{{ $deliveryCharge }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="checkout__total--footer">
                                                <tr class="checkout__total--footer__items">
                                                    <td
                                                        class="checkout__total--footer__title checkout__total--footer__list text-left">
                                                        Total </td>
                                                    <td
                                                        class="checkout__total--footer__amount checkout__total--footer__list text-right" id="finalPrice">
                                                        ₹{{ $finalPrice }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </details>
                            <nav>
                                <ol class="breadcrumb checkout__breadcrumb d-flex">
                                    <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                        <a class="breadcrumb__link" href="{{ route('cart.page') }}">Cart</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg"
                                            width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144">
                                            </path>
                                        </svg>
                                    </li>

                                    <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                        <span class="breadcrumb__text current">Information</span>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg"
                                            width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                        <span class="breadcrumb__text">Shipping</span>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg"
                                            width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144">
                                            </path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                        <span class="breadcrumb__text">Payment</span>
                                    </li>
                                </ol>
                            </nav>
                        </header>
                        <main class="main__content_wrapper">
                            <p action="#">
                            <div class="checkout__content--step section__contact--information">

                                <div class="customer__information">
                                    <div class="checkout__email--phone mb-12">
                                        <label>
                                            <input class="checkout__input--field border-radius-5"
                                                placeholder="Enter your Email" type="email" name="email">
                                        </label>
                                    </div>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox"
                                            name="update">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="check1">
                                            Email me with news and offers
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Shipping address</h3>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="First name (optional)" type="text"
                                                        name="first_name" required>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Last name (optional)" type="text" name="last_name">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Mobile number" type="phone" name="phone" maxlength="10">
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Address1" type="text" required name="address1"
                                                        required>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Apartment, suite, etc. (optional)" type="text"
                                                        name="address2">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label"
                                                    for="country">Country/region</label>
                                                <select class="checkout__input--select__field border-radius-5"
                                                    id="country" name="country">
                                                    <option value="India">India</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country">State</label>
                                                <select class="checkout__input--select__field border-radius-5"
                                                    id="country" name="state">
                                                    <option>Choose ...</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" @if ($lastAddress && $state->id ==
                                                        $lastAddress->state)
                                                        selected
                                                        @endif>{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country">City</label>
                                                <select class="checkout__input--select__field border-radius-5"
                                                    id="country" name="city">
                                                    <option>Choose ...</option>
                                                    @foreach ($cityNames as $cityId => $cityName)
                                                    <option value="{{ $cityId }}" @if ($lastAddress &&
                                                        $cityId==$lastAddress->id) selected @endif>
                                                        {{ $cityName }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5"
                                                        placeholder="Postal code" type="text" name="post_code">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="checkout__checkbox mt-4">
                                        <input class="checkout__radio--input" id="check2" type="radio">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="check2">
                                            Save this information for next time</label>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address pt-10">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Pay Method</h3>
                                    {{-- <p class="section__header--desc">Select the address that matches your card or payment method.</p> --}}
                                </div>
                                <div class="checkout__content--step__inner3 border-radius-5">
                                    <div class="checkout__address--content__header">
                                        <div class="shipping__contact--box__list">
                                            <div class="shipping__radio--input">
                                                <input class="shipping__radio--input__field" id="radiobox" name="paymethod" type="radio" value="cod" required>
                                            </div>
                                            <label class="shipping__radio--label" for="radiobox">
                                                <span class="shipping__radio--label__primary">Cash On Delivery</span>
                                            </label>
                                        </div>
                                        <div class="shipping__contact--box__list">
                                            <div class="shipping__radio--input">
                                                <input class="shipping__radio--input__field" id="radiobox" name="paymethod" type="radio" value="online" required>
                                            </div>
                                            <label class="shipping__radio--label" for="radiobox">
                                                <span class="shipping__radio--label__primary">Pay Online</span>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <button type="submit" class="continue__shipping--btn primary__btn border-radius-5"
                                    >Place Your Order</button>
                                <a class="previous__link--content" href="{{ route('cart.page') }}">Return to
                                    cart</a>
                            </div>
                        </main>
                        <footer class="main__footer checkout__footer">
                            <p class="copyright__content">Copyright © 2022 <a
                                    class="copyright__content--link text__primary" href="{{ route('home') }}">{{
                                    $comp_name }}</a> . All Rights Reserved.Design By {{ $comp_name }}</p>
                        </footer>
                    </div>
                    <aside class="checkout__sidebar sidebar">
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                    @foreach ($carts as $cart )

                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a
                                                        href="{{ route('product.detail.page',['id'=>$cart->product->id]) }}"><img
                                                            class="border-radius-5"
                                                            src="{{ asset('uploads/Products Images/'.$cart->product->image) }}"
                                                            alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">{{ $cart->times }}</span>
                                                </div>
                                                <div class="product__description">
                                                    <h3 class="product__description--name h4"><a
                                                            href="{{ route('product.detail.page',['id'=>$cart->product->id]) }}">{{
                                                            $cart->product->name }}</a>
                                                    </h3>
                                                    <span class="product__description--variant text-dark"
                                                        style="text-transform: uppercase;">COLOR: {{
                                                        $cart->product->colors }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">₹{{ $cart->product->discounted_price }}</span>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @php
                                                $deliveryCharge = 0;
                                                if ($totalPrice < 500) {{ $deliveryCharge=$formattedValue; }  } @endphp @if ($deliveryCharge> 0)
                                                    <div>
                                                        <span class="text-left">Delivery Charges</span>
                                                        <span class="text-right">₹{{ $deliveryCharge }}</span>
                                                    </div>

                                                    @else
                                                    <p class="text-success">Free Delivery</p>
                                                    @endif
                                                    @php
                                                    $finalPrice = $totalPrice + $deliveryCharge;
                                                    @endphp
                                        <p class="text-success">Expected delivery within 5 days.</p>

                        </div>
                        {{-- <div class="checkout__discount--code">
                            <form id="couponForm" action="{{ route('vaild.coupon') }}" method="POST"
                                class="d-flex">
                                @csrf
                                <input type="hidden" name="finalPrice" id="subfinalPrice" value="{{ $finalPrice }}">
                                <label>
                                    <input class="checkout__discount--code__input--field border-radius-5"
                                        placeholder="Gift card or discount code" type="text" id="dis" name="code">
                                </label>
                                <button class="checkout__discount--code__btn primary__btn border-radius-5"
                                id="coupon_btn">Apply</button>
                            </form>
                            <p class="text-danger d-none" id="errorcoupanmsg">Invaild Coupan Code</p>
                        </div> --}}
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Subtotal </td>
                                        <td class="checkout__total--amount text-right" id="finalPrice">₹{{ $finalPrice }}</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Shipping</td>
                                        <td class="checkout__total--calculated__text text-right">₹{{ $deliveryCharge }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td
                                            class="checkout__total--footer__title checkout__total--footer__list text-left">
                                            Total </td>
                                        <td
                                            class="checkout__total--footer__amount checkout__total--footer__list text-right" id="finalPrice">
                                            ₹{{ $finalPrice }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </aside>
                </div>
            </div>
            @foreach ($carts as $cart)
            <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
            <input type="hidden" name="product_id[]" value="{{ $cart->product_id }}">
            <input type="hidden" name="total_price" value="{{ $finalPrice }}">
            <input type="hidden" name="finalPrice" value="{{ $finalPrice }}">
            @endforeach
        </div>

    </form>
    @else
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('home') }}";
        }, 0);

    </script>
    @endif
    <!-- End checkout page area -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    <script src="{{ asset('assets/js/vendor/popper.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/glightbox.min.js') }}"></script>

    <!-- Customscript js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>


</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/get-cities/' + stateId
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="' + value.id + '">' + value.city + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    });

</script>
