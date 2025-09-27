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
              <img alt="" src="images/logo.png">
            </i>
          </div>
          <div class="l-auth-m__top">
            <a class="l-auth-m__back" href="#">
              <i class="icon-right"></i>
            </a>
            <h1 class="l-auth-m__title">فراموشی رمز عبور</h1>
          </div>
        </div>
        <div class="l-auth__ContentWrapper flex-center">
          <div class="l-auth__top d-none d-md-block">
            <img alt="" src="images/logo.png">
          </div>
          <p class="l-auth__title d-none d-md-block">فراموشی رمز عبور</p>
          <form method="POST" action="{{ route('password.email') }}" autocomplete="off" class="l-auth-m__form">
        @csrf
            <div class="p-login flex-center">
                <label style="font-size: 12px; width: 415px; text-align: center;" >
                    <i class="fas fa-email-alt me-2"></i> رمز عبور خود را فراموش کرده‌اید؟ مشکلی نیست. فقط آدرس ایمیل خود را برای ما ارسال کنید و ما یک لینک بازنشانی رمز عبور برای شما ارسال خواهیم کرد که به شما این امکان را می‌دهد تا رمز عبور جدیدی انتخاب کنید. </label>
        <div>
            
            <input id="email" placeholder="ایمیل خود را وارد کنید" class="username p-login__phone" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
            
            </div>
            <div class="l-auth-m__actionBar">
              <button class="l-auth__submitButton flex-center" type="submit">
                ارسال لینک پسورد </button>
            </div>
          </form>
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
	  <script src="{{asset('Assets/js/main-min.js')}}"></script>
	  <script src="{{asset('Assets/js/script.js')}}"></script>
  </body>

</html>
