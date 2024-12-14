@extends('layouts.header')
@section('content')
<style>
    .product__items--img {
        /* height: 400px;
        width: 100%;
        object-fit: cover; */
    }
</style>
{{-- <div class="cr-wish-notify " id="wishNotification">
    <p class="wish-note">Add product in <a href="#"> Cart </a> Successfully!</p>
</div> --}}
<main class="main__content_wrapper">
    <!-- Start slider section -->
    <section class="hero__slider--section">
        <div class="hero__slider--inner hero__slider--activation swiper">
            <div class="hero__slider--wrapper swiper-wrapper">
                <!-- Desktop Banners -->
                @foreach ($desktopBanners as $banner)
                <div class="swiper-slide desktop-banner">
                    <a href="{{ route('shop.page.find.categorie', ['catName' => $banner->category->url_link]) }}">
                        <div class="hero__slider--items home1__slider--bg"
                             style="background: url('{{ asset('uploads/Main Bannner/' . $banner->image) }}');
                                    background-repeat: no-repeat;
                                    height: 100vh;
                                    width: 100vw;
                                    background-position: center center;
                                    background-size: cover;">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <!-- Add content here if needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                <!-- Mobile Banners -->
                @foreach ($mobileBanners as $banner)
                <div class="swiper-slide mobile-banner">
                    <a href="{{ route('shop.page.find.categorie', ['catName' => $banner->category->url_link]) }}">
                        <div class="hero__slider--items home1__slider--bg"
                             style="background: url('{{ asset('uploads/Main Bannner/' . $banner->image) }}');
                                    background-repeat: no-repeat;
                                    height: 100vh;
                                    width: 100vw;
                                    background-position: center center;
                                    background-size: cover;">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <!-- Add content here if needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </section>

<!-- End slider section -->

<!-- Responsive styles -->
<style>
    /* Default styles */
    .home1__slider--bg {
        height: 1000px;
        background-size: cover;
    }

    /* Tablet adjustments */
    @media (max-width: 991px) {
        .home1__slider--bg {

        }
    }

    /* Mobile adjustments */
    @media (max-width: 767px) {
        .home1__slider--bg {

        }
    }
    /* Default: Show only desktop banners */
.mobile-banner {
    display: none;
}

/* Tablet adjustments */
@media (max-width: 991px) {
    .desktop-banner {
        display: none;
    }
    .mobile-banner {
        display: block;
    }
}

/* Mobile adjustments */
@media (max-width: 767px) {
    .desktop-banner {
        display: none;
    }
    .mobile-banner {
        display: block;
    }
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const desktopBanners = document.querySelectorAll(".desktop-banner");
    const mobileBanners = document.querySelectorAll(".mobile-banner");

    function toggleBanners() {
        if (window.innerWidth <= 991) {
            // Show mobile banners, hide desktop banners
            desktopBanners.forEach(banner => banner.style.display = "none");
            mobileBanners.forEach(banner => banner.style.display = "block");
        } else {
            // Show desktop banners, hide mobile banners
            desktopBanners.forEach(banner => banner.style.display = "block");
            mobileBanners.forEach(banner => banner.style.display = "none");
        }
    }

    // Run on page load and on resize
    toggleBanners();
    window.addEventListener("resize", toggleBanners);
});

</script>


    <!-- Start blog section -->
    <section class="blog__section section--padding ">
        <div class="container-fluid">
            <div class="blog__section--inner blog__swiper--activation swiper">
                <div class="swiper-wrapper">
                    @foreach ($categories as $categorie )
                    @if($categorie->type === "Big Reveal")

                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link]) }}"><img
                                        class="blog__thumbnail--img"
                                        src="{{ asset('uploads/Category Images/'.$categorie->image)}}"
                                        alt="blog-img"></a>
                            </div>

                        </div>
                    </div>
                    @endif

                    @endforeach

                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- End blog section -->







    <!-- Start banner section -->
    <section class="banner__section pt-5 pb-2">
        <div class="container-fluid">
            <div class="row mb--n28">
                <div class="col-lg-12 mb-28">
                    <div class="row row-cols-lg-3 row-cols-sm-3 row-cols-3">
                        @foreach ($categories as $categorie)

                        @if($categorie->type === "Nothing")
                        <div class="col-6 col-md-4 mb-28">
                            <div class="banner__items ">
                                <a class="banner__items--thumbnail position__relative"
                                    href="{{ route('shop.page.find.categorie',['catName'=> $categorie->name ]) }}"><img
                                        class="banner__items--thumbnail__img"
                                        src="{{ asset('uploads/Category Images/'.$categorie->image) }}"
                                        alt="banner-img">
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start product section -->
    <section class="product__section ">
        <div class="container-fluid">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle">New Products</h2>
            </div>

            <div class="tab_content">
                <div id="featured" class="tab_pane active show">
                    <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                            @foreach ($item as $items )

                            <div class="col mb-30">
                                <div class="product__items ">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link"
                                            href="{{ route('product.detail.page',['id'=>$items->id]) }}">
                                            <img class="product__items--img product__primary--img"
                                                src="{{ asset('uploads/Products Images/'.$items->image) }}"
                                                alt="product-img">
                                            <img class="product__items--img product__secondary--img"
                                                src="{{ asset('uploads/Products Images/'.$items->image2) }}"
                                                alt="product-img">
                                        </a>
                                        <div class="product__badge">
                                            <span class="product__badge--items sale">Sale</span>
                                        </div>
                                    </div>
                                    <div class="product__items--content">
                                        <span class="product__items--content__subtitle">
                                            {{ $items->category->name ?? 'No Category' }} -
                                            {{ $items->subcategory->name ?? 'No Subcategory' }}
                                        </span>

                                        <h3 class="product__items--content__title h4"><a
                                                href="{{ route('product.detail.page',['id'=>$items->id]) }}">{{
                                                $items->name }}</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">₹{{ $items->discounted_price }}</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price">₹{{ $items->price }}</span>
                                        </div>

                                        {{-- <ul class="product__items--action d-flex">
                                            <li class="product__items--action__list">
                                                @if (Auth::user())
                                                <a class="product__items--action__btn addToCartBtn"
                                                    data-id="{{ $items->id }}">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                        viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787"
                                                                    d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                    transform="translate(0 -463.248)"
                                                                    fill="currentColor"></path>
                                                                <path data-name="Path 16788"
                                                                    d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                    transform="translate(-1.191 -466.622)"
                                                                    fill="currentColor"></path>
                                                                <path data-name="Path 16789"
                                                                    d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                    transform="translate(-2.875 -466.622)"
                                                                    fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                @else
                                                <a class="product__items--action__btn add__to--cart addToCartBtn"
                                                    data-id="{{ $items->id }}">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                        viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787"
                                                                    d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                    transform="translate(0 -463.248)"
                                                                    fill="currentColor"></path>
                                                                <path data-name="Path 16788"
                                                                    d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                    transform="translate(-1.191 -466.622)"
                                                                    fill="currentColor"></path>
                                                                <path data-name="Path 16789"
                                                                    d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                    transform="translate(-2.875 -466.622)"
                                                                    fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </a>
                                                @endif
                                            </li>



                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start deals banner section -->
<section class="deals__banner--section mt-5 mb-5">
    <div class="container-fluid">
                <a href="{{ route('shop.page.find.categorie', ['catName' => $midbanners->category->url_link]) }}" style="width: 100%;">
                    <img src="{{ asset('uploads/Middle Banner/' . $midbanners->image) }}"
                         alt="Middle Banner"
                         class=""
                         style="width: 100%">
                </a>
    </div>
</section>
<!-- End deals banner section -->

<style>
    .bg-yellow{
        background-color: rgb(235, 178, 94);
    }
    @media (max-width: 768px) {
    .deals__banner--section img {
        height: auto;
    }
}

</style>

    <!-- Start product section -->
    @foreach ($sections as $index=> $currentSection)
    <section class="product__section ">
        <div class="container-fluid">
            @if (is_object($currentSection))
            <div class="section__heading text-center mb-50">
                <h2 class="section__heading--maintitle">{{ $currentSection->name }}</h2>
            </div>
            <div class="product__section--inner product__swiper--activation swiper ">

                <div class="swiper-wrapper">
                    @foreach ($currentSection->products->slice(0, 4) as $product)
                    <div class="swiper-slide pb-5">
                        <div class="product__items ">
                            <div class="product__items--thumbnail">
                                <a class="produSct__items--link"
                                    href="{{ route('product.detail.page',['id'=>$product->id]) }}">
                                    <img class="product__items--img product__primary--img"
                                        src="{{ asset('uploads/Products Images/'.$product->image) }}" alt="product-img">
                                    <img class="product__items--img product__secondary--img"
                                        src="{{ asset('uploads/Products Images/'.$product->image2) }}"
                                        alt="product-img">
                                </a>
                                <div class="product__badge">
                                    <span class="product__badge--items sale">Sale</span>
                                </div>
                            </div>
                            <div class="product__items--content">
                                <span class="product__items--content__subtitle">Suit, Women</span>
                                <h3 class="product__items--content__title h4"><a
                                        href="{{ route('product.detail.page',['id'=>$product->id]) }}">{{ $product->name
                                        }}</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">₹{{ $product->discounted_price }}</span>
                                    <span class="price__divided"></span>
                                    <span class="old__price">₹{{ $product->price }}</span>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
            @endif

        </div>
    </section>
    @endforeach

    <!-- End product section -->

    <!-- Start banner section -->
    {{-- <section class="banner__section section--padding pt-0">
        <div class="container-fluid">
            <div class="row row-cols-md-2 row-cols-1 mb--n28">
                <div class="col mb-28">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail " href="{{ route('shop.page') }}"><img
                                class="banner__items--thumbnail__img banner__img--max__height"
                                src="assets/img/banner/banner5.png" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle d-none d-lg-block">Pick Your Items</span>
                                <h2 class="banner__items--content__title h3">Up to 25% Off Order Now</h2>
                                <span class="banner__items--content__link"><u>Shop now</u></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-28">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail " href="{{ route('shop.page') }}"><img
                                class="banner__items--thumbnail__img banner__img--max__height"
                                src="assets/img/banner/banner6.png" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle d-none d-lg-block">Special offer</span>
                                <h2 class="banner__items--content__title h3">Up to 35% Off Order Now</h2>
                                <span class="banner__items--content__link"><u>Discover Now</u> </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End banner section -->

    <!-- Start testimonial section -->
    {{-- {{ dd($reviews) }} --}}


    @if($reviews->isEmpty())

    @else
    <section class="testimonial__section bg__gray--color section--padding">
        <div class="container-fluid">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">Our Clients Say</h2>
            </div>
            <div class="testimonial__section--inner testimonial__swiper--activation swiper">
                <div class="swiper-wrapper">
                    @php
                    $i=0;
                    @endphp
                    @foreach ($reviews as $review )

                    <div class="swiper-slide">
                        <div class="testimonial__items text-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img border-radius-50"
                                    src="{{ asset('uploads/Client Images/'.$review->image) }}" alt="testimonial-img"
                                    style="border-radius: 50%;height:70px;width:70px;">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">{{ $review->name }}</h3>
                                <span class="testimonial__items--subtitle h1">{{ $review->head }}</span>
                                <p class="testimonial__items--desc">{{ $review->review }}</p>
                                <ul class="rating testimonial__rating d-flex justify-content-center">

                                    @for ($i = 0; $i < $review->stars; $i++)

                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        @endfor



                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="testimonial__pagination swiper-pagination"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- End testimonial section -->

    <!-- Start banner section -->
    <section class="banner__section section--padding pt-0">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="banner__section--inner position__relative">
                        <a class="banner__items--thumbnail display-block"
                            href="{{ route('shop.page.find.categorie', ['catName' => $lastbanners->category->url_link]) }}"><img
                                class="banner__items--thumbnail__img banner__img--height__md display-block"
                                src="{{ asset('uploads/Last Banner/'.$lastbanners->image) }}" alt="banner-img"
                                style="width: 100%">
                            {{-- <div class="banner__content--style2">
                                <h2 class="banner__content--style2__title text-white">Need Winter Boots? </h2>
                                <p class="banner__content--style2__desc">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                    enim ad minim veniam, quis nostrud exercitation </p>
                                <span class="primary__btn">Shop Now
                                    <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg"
                                        width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </div> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start blog section -->
    {{-- <section class="blog__section section--padding pt-0">
        <div class="container-fluid">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">From The Blog</h2>
            </div>
            <div class="blog__section--inner blog__swiper--activation swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="#"><img
                                        class="blog__thumbnail--img" src="assets/img/blog/blog1.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">February 03, 2022</span>
                                <h3 class="blog__content--title"><a href="#">Fashion Trends In 2021
                                        Styles,
                                        Colors, Accessories</a></h3>
                                <a class="blog__content--btn primary__btn" href="#">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="#"><img
                                        class="blog__thumbnail--img" src="assets/img/blog/blog2.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">February 03, 2022</span>
                                <h3 class="blog__content--title"><a href="#">Meet the Woman Behind Cool
                                        Ethical Label Refor </a></h3>
                                <a class="blog__content--btn primary__btn" href="#">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="#"><img
                                        class="blog__thumbnail--img" src="assets/img/blog/blog3.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">February 03, 2022</span>
                                <h3 class="blog__content--title"><a href="#">Lauryn Hill Could Make
                                        Tulle
                                        Skirt and Cowboy</a></h3>
                                <a class="blog__content--btn primary__btn" href="#">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="#"><img
                                        class="blog__thumbnail--img" src="assets/img/blog/blog4.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">February 03, 2022</span>
                                <h3 class="blog__content--title"><a href="#">Fashion Trends In 2021
                                        Styles,
                                        Colors, Accessories</a></h3>
                                <a class="blog__content--btn primary__btn" href="#">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="#"><img
                                        class="blog__thumbnail--img" src="assets/img/blog/blog2.png" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">February 03, 2022</span>
                                <h3 class="blog__content--title"><a href="#">Lauryn Hill Could Make
                                        Tulle
                                        Skirt and Cowboy</a></h3>
                                <a class="blog__content--btn primary__btn" href="#">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section> --}}
    <!-- End blog section -->
<!-- Start blog section -->
<section class="blog__section section--padding ">
    <div class="container-fluid">
        <div class="blog__section--inner blog__swiper--activation swiper">
            <div class="swiper-wrapper">
                @foreach ($categories as $categorie )
                @if($categorie->type === "Darbar")

                <div class="swiper-slide">
                    <div class="blog__items">
                        <div class="blog__thumbnail">
                            <a class="blog__thumbnail--link" href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link]) }}"><img
                                    class="blog__thumbnail--img"
                                    src="{{ asset('uploads/Category Images/'.$categorie->image)}}"
                                    alt="blog-img"></a>
                        </div>

                    </div>
                </div>
                @endif
                @endforeach

            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </div>
</section>
<!-- End blog section -->

</main>

@endsection
