 @extends('front-end.app')
 @section('style')
 @endsection
 @section('content')
 @php
    $title = 'title_'.app()->getLocale();
    $content = 'content_'.app()->getLocale();
 @endphp

 <div class="main-wrapper-m">
 	<section class="tp-section section">
 		<div class="banner-menu">
 			<div class="menu-ul">
 				<span class="menu-li"><a href="{{url('/')}}">Home</a><i class="fas fa-chevron-left"></i></span>
 				<span class="menu-li">{{$data->$title}}</span>
 			</div>
 		</div>
 		<div class="term-con-cnt">
 			<div class="tlt-part mt-3">
 				<h2 class="border-tlt text-uppercase"><span>{{$data->$title}}</span></h2>
 			</div>
 			<div class="cnt-details">
 				<p>{!! $data->$content !!}</p>
 			</div>

 		</div>
 	</section>
 </div>
 @endsection
 @section('script')
 <script>

 </script>
 @endsection