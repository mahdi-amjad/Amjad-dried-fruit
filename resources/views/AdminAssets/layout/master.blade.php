<!doctype html>
<html lang="en" dir="ltr">
@include('AdminAssets.layout.Head-tag')
<body class="main-body app sidebar-mini ltr">
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @include('AdminAssets.layout.switcher-code')
    @include('AdminAssets.layout.loader')
	<div class="page custom-index">
        @include('AdminAssets.layout.nav-part')
		<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        @include('AdminAssets.layout.sidbar-part')
		<div class="main-content app-content">
			<div class="main-container container-fluid">
                @include('AdminAssets.layout.nav-part-two')
			@yield('content')
			</div>
		</div>
        @include('AdminAssets.layout.Footer-tag')
	</div>
    @include('AdminAssets.layout.js')
</body>
</html>
