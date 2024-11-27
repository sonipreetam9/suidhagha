<!doctype html>
<html lang="zxx">


<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $comp_webtitle }}</title>
    <meta name="description" content="Sari Fashion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/fav.png') }}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/glightbox.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .main__header {
            background-color: rgb(235, 178, 94);
        }

        .header__account--btn {
            position: relative;
            color: #ffffff;
            text-align: center;
        }

        .header__sticky.sticky {
            background-color: rgb(235, 178, 94);

        }

        .header__menu--link {
            color: #ffffff;

        }

        #mainDiv {
            background-color: rgb(235, 178, 94);
            display: flex;
            justify-content: center;
        }

        #footerBg {
            background-color: rgb(235, 178, 94);
        }

        .footer__widget--menu__text {
            color: rgb(0, 0, 0);

        }

        .banner__img--height__md {
            /* height: 30rem; */
            -o-object-fit: contain;
            object-fit: contain;
        }

        .banner__section--inner::before {
            background: none;
        }

        .header__menu--link {
            color: #ffffff;
            /* background-color: red; */
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .highlighted {
            background-color: #fbaf3c;
            color: white;
        }

        .header__menu--link.highlighted:hover {
            color: rgb(229, 223, 223);
        }

        .header__section {
            background: #000 !important;
        }
    </style>
</head>

<body>

    <!-- Start preloader -->
    {{-- <div id="preloader">
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
    </div> --}}
    <!-- End preloader -->

    <!-- Start header area -->
    <header class="header__section">
        {{-- <div class="header__topbar bg__secondary">
            <div class="container-fluid">
                <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                    <div class="header__shipping">
                        <ul class="header__shipping--wrapper d-flex">
                            <li class="header__shipping--text text-white">Welcome to {{ $comp_name }} online Store</li>
                            <li class="header__shipping--text text-white d-sm-2-none"><img
                                    class="header__shipping--text__icon" src="{{ asset('assets/img/icon/bus.png') }}"
                                    alt="bus-icon"> Track Your Order</li>
                            <li class="header__shipping--text text-white d-sm-2-none"><img
                                    class="header__shipping--text__icon" src="{{ asset('assets/img/icon/email.png') }}"
                                    alt="email-icon"> <a class="header__shipping--text__link"
                                    href="{{ $comp_email }}">{{ $comp_email }}</a></li>
                        </ul>
                    </div>
                    <div class="language__currency d-none d-lg-block">
                        <ul class="d-flex align-items-center">
                            <li class="language__currency--list">
                                <a class="language__switcher text-white" href="#">
                                    <img class="language__switcher--icon__img" src="assets/img/icon/language-icon.png"
                                        alt="currency">
                                    <span>English</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05"
                                        viewBox="0 0 9.797 6.05">
                                        <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <div class="dropdown__language">
                                    <ul>
                                        <li class="language__items"><a class="language__text" href="#">France</a></li>
                                        <li class="language__items"><a class="language__text" href="#">Russia</a></li>
                                        <li class="language__items"><a class="language__text" href="#">Spanish</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="language__currency--list">
                                <a class="account__currency--link text-white" href="#">
                                    <img src="assets/img/icon/usd-icon.png" alt="currency">
                                    <span>$ US Dollar</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05"
                                        viewBox="0 0 9.797 6.05">
                                        <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                <div class="dropdown__currency">
                                    <ul>
                                        <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <style>
            .header__select--inner {
                border-radius: 23px 0px 0px 23px;
                /* background:rgba(235, 179, 94, 0.616); */
            }

            .header__search--button {
                /* background:rgba(235, 179, 94, 0.747); */

                border-radius: 0px 23px 23px 0px;
            }

            .header__search--input {
                border-radius: 0px 23px 23px 0px;
                /* background:rgba(235, 179, 94, 0.705); */

            }

            .header__search--form {
                border: none;
                /* border:1px solid white;
                border-radius: 20px; */
            }

            /* .main__header{
                background: none !important;
            } */
        </style>
        @if($var=="home")
        <style>
            /* Navbar styling */
            .main__header {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 10;
                background-color: rgba(0, 0, 0, 0.10);

            }

            .main__header .nav-link {
                color: white !important;
                font-weight: 500;
            }

            .main__header .form-control {
                border-radius: 20px;
                max-width: 300px;
            }

            .main__header-brand img {
                height: 50px;
            }

            .header__botto {
                position: absolute;
                top: 1.1%;
                width: 100%;
                z-index: 9;
                background: transparent;
            }

            #mainDiv {
                background-color: rgba(0, 0, 0, 0.10);
                display: flex;
                justify-content: center;
            }
        </style>
        @endif
        <div class="main__header header__sticky">
            <div class="container-fluid">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                            </svg>
                            <span class="visually-hidden">Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="{{ route('home.page') }}"><img
                                    class="main__logo--img"
                                    src="{{ asset('assets/img/logo/logo-white.png') }}"
                                    alt="logo-img" width="150" height="50"></a></h1>
                    </div>
                    {{-- <div class="header__search--widget header__sticky--none d-none d-lg-block">
                        <form class="d-flex header__search--form" action="{{ route('search.products.post') }}"
                            method="POST">
                            @csrf
                            <div class="header__select--categories select">
                                <select class="header__select--inner" name="categorie">
                                    <option selected value="">All Categories</option>
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="header__search--box">
                                <label>
                                    <input class="header__search--input" placeholder="Suit Set , Dress" type="text"
                                        name="name">
                                </label>
                                <button class="header__search--button bg__secondary text-white" type="submit"
                                    aria-label="search button">
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg"
                                        width="27.51" height="26.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div> --}}
                    <div class="header__search--widget d-none d-lg-block">
                        <ul class="d-flex ">
                            <li class="header__menu--items style2">
                                <a class="header__menu--link" href="{{ route('home.page') }}">Home

                                </a>
                            </li>


                            @foreach ($categories as $categorie)
                            @if($categorie->in_navbar === "Yes")

                            <li class="header__menu--items style2">
                                <a class="header__menu--link @if($categorie->highlight == 'Yes') highlighted @endif"
                                    href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link ]) }}">
                                    {{ $categorie->name }} <svg class="menu__arrowdown--icon"
                                        xmlns="http://www.w3.org/2000/svg" width="12" height="7.41"
                                        viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                            transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                    </svg>
                                </a>
                                {{-- Check if the category has subcategories --}}
                                @if($categorie->subcategories && $categorie->subcategories->isNotEmpty())
                                <ul class="header__sub--menu">
                                    @foreach($categorie->subcategories as $subcategory)
                                    <li class="header__sub--menu__items">
                                        <a href="{{ route('shop.page.find.subcategorie', ['subCate' => $subcategory->name ]) }}"
                                            class="header__sub--menu__link">
                                            {{ $subcategory->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items">
                                        <a href="javascript:void(0);" class="header__sub--menu__link">No
                                            subcategories available</a>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endif

                            @endforeach
                            </li>
                        </ul>
                    </div>

                    <div class="header__account header__sticky--none">
                        <ul class="d-flex">
                            <li
                            class="header__account--items header__account2--items  header__account--search__items d-none d-lg-block">
                            <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                data-offcanvas>
                                <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg"
                                    width="26.51" height="23.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                        stroke-width="32" />
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                </svg>
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>
                            <li class="header__account--items">
                                @if (Auth::check())
                                <a class="header__account--btn" href="{{ route('user.dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <path
                                            d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                    </svg>

                                    <span class="header__account--btn__text"></span>
                                </a>
                                @else


                                <a class="header__account--btn" href="{{ route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <path
                                            d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                    </svg>

                                    <span class="header__account--btn__text"></span>
                                    @endif




                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn" href="{{ route('cart.page') }}" data-offcanvas id="cartLink">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C10.35 2 9 3.35 9 5V6H5.5C4.12 6 3 7.12 3 8.5V19.5C3 20.88 4.12 22 5.5 22H18.5C19.88 22 21 20.88 21 19.5V8.5C21 7.12 19.88 6 18.5 6H15V5C15 3.35 13.65 2 12 2ZM10 6V5C10 4.45 10.45 4 11 4C11.55 4 12 4.45 12 5V6H10ZM13 6V5C13 4.45 13.45 4 14 4C14.55 4 15 4.45 15 5V6H13ZM5.5 8H18.5C18.78 8 19 8.22 19 8.5V19.5C19 19.78 18.78 20 18.5 20H5.5C5.22 20 5 19.78 5 19.5V8.5C5 8.22 5.22 8 5.5 8Z" />
                                    </svg>
                                    <span class="header__account--btn__text"></span>
                                    <span class="items__count" id="cartBadge"></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    {{-- <div class="header__menu d-none header__sticky--block d-lg-block">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items style2">
                                    <a class="header__menu--link" href="{{ route('home.page') }}">Home

                                    </a>
                                </li>


                                @foreach ($categories as $categorie)
                                @if($categorie->in_navbar === "Yes")

                                <li class="header__menu--items style2">
                                    <a class="header__menu--link @if($categorie->highlight == 'Yes') highlighted @endif"
                                        href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link ]) }}">
                                        {{ $categorie->name }} <svg class="menu__arrowdown--icon"
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="7.41"
                                            viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    @if($categorie->subcategories && $categorie->subcategories->isNotEmpty())
                                    <ul class="header__sub--menu">
                                        @foreach($categorie->subcategories as $subcategory)
                                        <li class="header__sub--menu__items">
                                            <a href="{{ route('shop.page.find.subcategorie', ['subCate' => $subcategory->name ]) }}"
                                                class="header__sub--menu__link">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <ul class="header__sub--menu">
                                        <li class="header__sub--menu__items">
                                            <a href="javascript:void(0);" class="header__sub--menu__link">No
                                                subcategories available</a>
                                        </li>
                                    </ul>
                                    @endif
                                </li>
                                @endif

                                @endforeach
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                    <div class="header__account header__account2 header__sticky--block">
                        <ul class="d-flex">
                            <li
                                class="header__account--items header__account2--items  header__account--search__items d-none d-lg-block">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                    data-offcanvas>
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg"
                                        width="26.51" height="23.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
                                    </svg>
                                    <span class="visually-hidden">Search</span>
                                </a>
                            </li>
                            <li class="header__account--items header__account2--items">
                                <a class="header__account--btn" href="{{ route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32" />
                                        <path
                                            d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32" />
                                    </svg>
                                    <span class="visually-hidden">My Account</span>
                                </a>
                            </li>
                            <li class="header__account--items header__account2--items">
                                <a class="header__account--btn " href="{{ route('cart.page') }}" data-offcanvas
                                    id="cartLink">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C10.35 2 9 3.35 9 5V6H5.5C4.12 6 3 7.12 3 8.5V19.5C3 20.88 4.12 22 5.5 22H18.5C19.88 22 21 20.88 21 19.5V8.5C21 7.12 19.88 6 18.5 6H15V5C15 3.35 13.65 2 12 2ZM10 6V5C10 4.45 10.45 4 11 4C11.55 4 12 4.45 12 5V6H10ZM13 6V5C13 4.45 13.45 4 14 4C14.55 4 15 4.45 15 5V6H13ZM5.5 8H18.5C18.78 8 19 8.22 19 8.5V19.5C19 19.78 18.78 20 18.5 20H5.5C5.22 20 5 19.78 5 19.5V8.5C5 8.22 5.22 8 5.5 8Z" />
                                    </svg>
                                    <span class="items__count style2" id="mobcartBadge"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="header__botto">
            <div class="container-fluid" id="mainDiv">
                <div
                    class="header__bottom--inner position__relative d-none d-lg-flex justify-content-between align-items-center">
                    <div class="header__menu">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{ route('home.page') }}">Home

                                    </a>
                                </li>
                                @foreach ($categories as $categorie)
                                @if($categorie->in_navbar === "Yes")
                                <li class="header__menu--items">
                                    <a class="header__menu--link @if($categorie->highlight == 'Yes') highlighted @endif"
                                        href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link ]) }}">
                                        {{ $categorie->name }}
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12"
                                            height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                        </svg>
                                    </a>
                                    @if($categorie->subcategories && $categorie->subcategories->isNotEmpty())
                                    <ul class="header__sub--menu">
                                        @foreach($categorie->subcategories as $subcategory)
                                        <li class="header__sub--menu__items">
                                            <a href="{{ route('shop.page.find.subcategorie', ['subCate' => $subcategory->name ]) }}"
                                                class="header__sub--menu__link">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <ul class="header__sub--menu">
                                        <li class="header__sub--menu__items">
                                            <a href="javascript:void(0);" class="header__sub--menu__link">No
                                                subcategories available</a>
                                        </li>
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas__header">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="{{ route('home.page') }}">
                        <img src="{{ asset('assets/img/logo/logo-white.png') }}"
                            alt="Grocee Logo" width="130" height="40">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas>close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="{{ route('home.page') }}">Home</a>
                        </li>
                        @foreach ($categories as $categorie)
                        @if($categorie->in_navbar === "Yes")
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item @if($categorie->highlight == 'Yes') highlighted @endif"
                                href="{{ route('shop.page.find.categorie', ['catName' => $categorie->url_link ]) }}">
                                {{ $categorie->name }}

                            </a>

                            @if($categorie->subcategories && $categorie->subcategories->isNotEmpty())
                            <ul class="offcanvas__sub_menu">
                                @foreach($categorie->subcategories as $subcategory)
                                <li class="offcanvas__sub_menu_li">
                                    <a href="{{ route('shop.page.find.subcategorie', ['subCate' => $subcategory->name ]) }}"
                                        class="offcanvas__sub_menu_item">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li">
                                    <a href="javascript:void(0);" class="offcanvas__sub_menu_item">No subcategories
                                        available</a>
                                </li>
                            </ul>
                            @endif
                        </li>
                        @endif
                        @endforeach


                    </ul>
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{ route('login') }}">
                            <span class="offcanvas__account--items__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="32" />
                                    <path
                                        d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                </svg>
                            </span>
                            <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{ route('home.page') }}">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443"
                                viewBox="0 0 22 17">
                                <path fill="currentColor"
                                    d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z">
                                </path>
                            </svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{ route('shop.page') }}">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443"
                                viewBox="0 0 448 512">
                                <path
                                    d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z">
                                </path>
                            </svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)"
                        data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                    fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="32" d="M338.29 338.29L448 448" />
                            </svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Search</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn " href="{{ route('cart.page') }}" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C10.35 2 9 3.35 9 5V6H5.5C4.12 6 3 7.12 3 8.5V19.5C3 20.88 4.12 22 5.5 22H18.5C19.88 22 21 20.88 21 19.5V8.5C21 7.12 19.88 6 18.5 6H15V5C15 3.35 13.65 2 12 2ZM10 6V5C10 4.45 10.45 4 11 4C11.55 4 12 4.45 12 5V6H10ZM13 6V5C13 4.45 13.45 4 14 4C14.55 4 15 4.45 15 5V6H13ZM5.5 8H18.5C18.78 8 19 8.22 19 8.5V19.5C19 19.78 18.78 20 18.5 20H5.5C5.22 20 5 19.78 5 19.5V8.5C5 8.22 5.22 8 5.5 8Z" />
                            </svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                        <span class="items__count cart-badge" id="mobcartBadge2"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->


        <!-- Start serch box area -->
        <div class="predictive__search--box ">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="{{ route('search.products.post') }}" method="POST">
                    @csrf
                    <label>
                        <input class="predictive__search--input" placeholder="Search Here" type="text" name="name">
                    </label>
                    <button class="predictive__search--button" aria-label="search button" type="submit"><svg
                            class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                            height="25.443" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                                stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="32" d="M338.29 338.29L448 448" />
                        </svg> </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close button" data-offcanvas>
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                    height="30.443" viewBox="0 0 512 512">
                    <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M368 368L144 144M368 144L144 368" />
                </svg>
            </button>
        </div>
        <!-- End serch box area -->

    </header>
    <!-- End header area -->
    @yield('content')
    @extends('layouts.js')
    @extends('layouts.footer')
