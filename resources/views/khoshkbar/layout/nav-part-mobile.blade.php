	<nav class="nav panel-menu" role="navigation" id="panel-menu">
		<span class="closePanel close-menu"><i class="fal fa-times"></i></span>
		<div class="row header-menu">
			<div class="col-12 p-0">
				<div class="btn-menu"> منوی دسترسی </div>
			</div>
		</div>
	  <div class="row">
		  <div class="col-12 p-0">
	  <ul>
		
		<li class="main-menu"> <a href="{{ route('home') }}"> صفحه اصلی </a> </li>
		<li class="main-menu"> <a href="{{ route('All_product') }}">  محصولات </a> </li>
		<li class="main-menu"> <a href="{{ route('products.wholesale') }}">  خرید عمده</a> </li>
	   <li class="main-menu"> <a href="{{ route('Allpost') }}">بلاگ</a> </li>
	   <li class="main-menu"> <a href="{{ route('About') }}">درباره ما</a> </li>
	   <li class="main-menu"> <a href="{{ route('Contact') }}">تماس با ما</a> </li>
	  </ul>
		  </div>
	  </div>
	</nav>
