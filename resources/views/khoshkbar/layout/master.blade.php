<!doctype html>
<html lang="fa" dir="rtl">
@include('khoshkbar.layout.Head-tag')
<body>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
	<div class="page container-fluid p-0">
    <!--منو گوشی-->
    @include('khoshkbar.layout.nav-part-mobile')
	<!--منو گوشی-پایان-->
    @include('khoshkbar.layout.banner-header')

    @include('khoshkbar.layout.nav-part')
	<div class="c-navi-categories__overlay js-navi-overlay"></div>
    @yield('content')
    @include('khoshkbar.layout.Footer-tag')

	</div>
    @include('khoshkbar.layout.js')

</body>
</html>
