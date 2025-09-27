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
      
        <div class="l-auth__slogan d-flex">
          <div>
            <div class="l-auth__logoIcon">
              <i class="icon-mtr">
                <img alt="" src="{{asset('Assets/images/logoamjad.png')}}">
              </i>
            </div>
            <p class="l-auth__authText" >ممنون که ثبت‌نام کردید! قبل از شروع، لطفاً ایمیل خود را با کلیک روی لینکی که به تازگی برای شما ارسال کرده‌ایم، تأیید کنید. اگر ایمیل را دریافت نکردید، خوشحال می‌شویم که دوباره آن را برای شما ارسال کنیم.</p>
          </div>
          @if (session('status') == 'verification-link-sent')
          <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
              {{ __('یک لینک تأیید جدید به آدرس ایمیلی که هنگام ثبت نام ارائه کرده اید ارسال شده است.') }}
          </div>
      @endif
          <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="block mt-3">
                    <button type="submit" style="background: border-box; font-size: medium; color: white;">
                        {{ __('خروج') }}
                    </button>
                </div>
           
            </form>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
    
                <div>
                    <button>
                    
                    </button>
                    <button class="l-auth__submitButton flex-center" type="submit">
                        {{ __('ارسال مجدد پیوند تایید ایمیل') }}</button>
                </div>
            </form>
    
          
        </div>
        </div>
      </div>
	  <script src="js/main-min.js"></script>
	  <script src="js/script.js"></script>
  </body>

<!-- Mirrored from javid-pg.com/shopify/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 15:28:21 GMT -->
</html>