@extends('layouts.header')
@section('content')
<main class="main__content_wrapper">



    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form id="loginForm" method="POST">
                @csrf
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1 d-flex justify-content-center">
                        <div class="col">
                            <div class="account__login">
                                <div style="text-align: center">
                                    <small class="text-danger" id="error-message"></small>
                                </div>
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login if you area a returning customer.
                                    </p>
                                </div>
                                <div class="account__login--inner">
                                    <input class="account__login--input" placeholder="Email Addres" type="email" name="email">
                                    <input class="account__login--input" placeholder="Password" type="password" name="password">
                                    <div
                                        class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label"
                                                for="check1">
                                                Remember me</label>
                                        </div>
                                        <button class="account__login--forgot" type="submit">Forgot Your
                                            Password?</button>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit" id="loginButton">Login</button>
                                    <div class="account__login--divide">
                                        <span class="account__login--divide__text">OR</span>
                                    </div>
                                    {{-- <div class="account__social d-flex justify-content-center mb-15">
                                        <a class="account__social--link facebook" target="_blank"
                                            href="https://www.facebook.com/">Facebook</a>
                                        <a class="account__social--link google" target="_blank"
                                            href="https://www.google.com/">Google</a>
                                        <a class="account__social--link twitter" target="_blank"
                                            href="https://twitter.com/">Twitter</a>
                                    </div> --}}
                                    <p class="account__login--signup__text">Don,t Have an Account? <a
                                            href="{{ route('register.page') }}">Sign up now</a></p>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function() {
        $("#loginButton").on("click", function(event) {
            event.preventDefault();
            var formData = new FormData($("#loginForm")[0]);
            var $message = $("#error-message");

            $.ajax({
                type: "POST"
                , url: "{{ route('check.login') }}"
                , data: formData
                , contentType: false
                , processData: false
                , success: function(response) {
                    if (response.status) {
                        // Redirect to home page
                        window.location.href = "{{ route('login') }}";
                    } else {
                        // Display error message in the specified div
                        $message.text(response.msg || 'Invalid credentials. Please try again.');
                    }
                }
                , error: function(error) {
                    // Handle other errors
                    if (error.status === 422) {
                        var errors = error.responseJSON.errors;
                        var errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>';
                        });

                        $message.html(errorMessage);
                    } else {
                        $message.text('Invalid credentials. Please try again.');
                    }
                }
            });
        });
    });

</script>
@endsection
