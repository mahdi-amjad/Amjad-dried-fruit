<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#95bf47">
		<title>ورود به سایت</title>
		<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/main.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/template.css')}}" />
		
	</head>

      <div class="l-auth__container">
        <div class="l-auth-m__header flex-center">
          <div class="l-auth-m__logo">
            <i class="icon-mini-mtr">
              <img alt="" src="{{asset('Assets/images/logoamjad.png')}}">
            </i>
          </div>
          <div class="l-auth-m__top">
            <a class="l-auth-m__back" href="#">
              <i class="icon-right"></i>
            </a>
            <h1 class="l-auth-m__title">ثبت نام</h1>
          </div>
        </div>
        <div class="l-auth__ContentWrapper flex-center" :status="session('status')" >
          <div class="l-auth__top d-none d-md-block">
            <img alt="" src="images/logo.png">
          </div>
          <p class="l-auth__title d-none d-md-block">ثبت نام</p>
          <form method="POST" action="{{ route('register') }}" autocomplete="off" class="l-auth-m__form">
            @csrf
            <div class="p-login flex-center">
              <div>
                <input id="name" class="username p-login__phone" placeholder="نام کاربری خود را وارد کنید" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <input id="email" class="username p-login__phone" placeholder="ایمیل خود را وارد کنید" type="email" name="email"  required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <input id="password" class="username p-login__phone" placeholder="پسورد خود را وارد کنید" type="password" name="password"  required autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <input id="password_confirmation" class="username p-login__phone" placeholder="تکرار پسورد خود را وارد کنید" type="password" name="password_confirmation"  required autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        
              <div class="l-auth-m__acceptPolicy d-xl-none d-lg-none d-md-none">
                <p>با ورود یا ثبت نام در شاپی فای کلیه <span id="privacy-rules-link" class="l-auth__rulesLink">قوانین حریم خصوصی</span> و <span id="mtr-rules-link" class="l-auth__rulesLink">قوانین شاپی فای</span> را می&zwnj;پذیرم. </p>
              
            </div>
            <div class="block mt-3">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('قبلاً ثبت‌نام کرده‌اید؟') }}
                </a>
            </div>
            </div>
            <div class="l-auth-m__actionBar block mt-3">
              <button class="l-auth__submitButton flex-center" type="submit">
                ارسال کد تایید </button>
            
            </div>
          </form>
          <p class="l-auth__acceptPolicy d-none d-md-block">با ورود یا ثبت نام در شاپی فای کلیه <span id="privacy-rules-link" class="l-auth__rulesLink">قوانین حریم خصوصی</span> و <span id="mtr-rules-link" class="l-auth__rulesLink">قوانین شاپی فای</span> را می‌پذیرم. </p>
        </div>
        <div class="l-auth__slogan d-flex">
          <div>
            <div class="l-auth__logoIcon">
              <i class="icon-mtr">
                <img alt="" src="images/logo.png">
              </i>
            </div>
            <p class="l-auth__sloganText">اینجا همه می تونن خرید کنن</p>
            <p class="l-auth__authText">همین حالا عضوی از شاپی فای شو و  کلی خرید هیجان انگیز داشته باش!</p>
          </div>
          <a class="l-auth__backToHome flex-center" href="https://javid-pg.com/">
            <i class="fal fa-chevron-right me-2"></i> بازگشت به صفحه اصلی </a>
        </div>
      </div>
	  <script src="js/main-min.js"></script>
	  <script src="js/script.js"></script>
  </body>

<!-- Mirrored from javid-pg.com/shopify/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 15:28:21 GMT -->
</html>