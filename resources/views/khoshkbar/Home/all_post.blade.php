@extends('khoshkbar.layout.master')

@section('content')
<section class="container-fluid inner-section">
	<div class="container p-0">
	  <div class="row mt-2 mb-4">
        @foreach ($allposts as $allpost)
            <div class="col-md-4 col-12 item-blog mt-3">
			<div class="card crd-blog">
				<div class="d-block img-project position-relative">
				  <img src="{{ asset('AdminAssets.Post-image/' . $allpost->image) }}" class="img-fluid w-100" alt="">
				  <a class="box-content" href="{{ route('Post', $allpost->id) }}">
						 <span class="post">
						  مشاهده بیشتر	
						</span>
					 </a>
				</div>
				<div class="d-block c-project mt-2">
				{{ $allpost->name }}
				</div>
				<div class="d-block t-project mt-2">
				  <a href="blog-detail.html"> {!! substr($allpost->content,0,120) !!}</a>
				</div>
			  </div>
		</div>
        @endforeach
		
	
	  </div>  
	 
   </div>
  </section>
@endsection
