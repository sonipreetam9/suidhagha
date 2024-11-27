@extends('layouts.header')
@section('content')
<main class="main__content_wrapper">

  

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form  action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1 d-flex justify-content-center">

                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer
                                    </p>
                                </div>
                                <div class="account__login--inner">
                                    <input class="account__login--input" placeholder="Username" type="text" required name="username">
                                    @if ($errors->has('username'))
                                    <p class="text-danger">{{ $errors->first('username') }}</p>
                                    @endif
                                    <input class="account__login--input" placeholder="Email Addres" type="text" name="email">
                                    @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                    <input class="account__login--input" placeholder="Password" type="password" name="password">
                                    @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                    <input class="account__login--input" placeholder="Confirm Password" type="password"
                                        name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                    <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                    <button class="account__login--btn primary__btn mb-10" type="submit">Submit &
                                        Register</button>
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            I have read and agree to the terms & conditions</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->



</main>

@endsection
