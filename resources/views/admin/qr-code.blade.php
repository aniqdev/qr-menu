@extends('layouts.back')

@section('content')
<style>
.img-thumbnail svg{
	max-width: 100%;
}
.qr-image{
	max-width: 70%;
    image-rendering: pixelated;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}	
</style>

<div class="shadow-block">
	<h2>{{ __('admin_qr.qr_code') }}</h2>
	<hr>
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 text-center">
			<div class="alert alert-info" role="alert">
	          <h3>{{ __('admin_qr.cafe_link') }}</h3> <a href="{{ $cafe_link }}" target="_blank" class="alert-link">{{ $cafe_link }}</a>
	        </div>
	        <div class="img-thumbnail mb-4 position-relative">
		        <img src="/images/loading-icon-with-text.jpg" alt="">
				<img class="w-100 qr-image" src="{{ route('admin.cafe-qr-code-image') }}" alt="" style="max-width: 70%; image-rendering: pixelated;">
			</div>
			<div class="row mb-4">
				<div class="col-12">
					<a href="{{ route('admin.cafe-qr-code-image') }}" download="{{ $company->slug }}-cafe.png" class="btn btn-outline-secondary w-100">{{ __('admin_qr.download_png') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
