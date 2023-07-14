@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2>{{ __('admin_settings.company_settings') }}</h2>
	<hr>
	<div class="row">
		{{-- <div class="col-lg-1"></div> --}}
		<div class="col-lg-6 text-center">
			<div class="alert alert-info" role="alert">
	          Cafe link:<br> <a href="{{ $cafe_link }}" target="_blank" class="alert-link">{{ $cafe_link }}</a>
	        </div>
			<img class="img-thumbnail mb-4" src="https://cdn.ttgtmedia.com/rms/misc/qr_code_barcode.jpg" alt="">
			<div class="row">
				<div class="col-6">
					<button class="btn btn-outline-secondary w-100">Download PNG</button>
				</div>
				<div class="col-6">
					<button class="btn btn-outline-secondary w-100">Download JPG</button>
				</div>
			</div>
		</div>
		{{-- <div class="col-lg-1"></div> --}}

		{{-- <div class="col-lg-1"></div> --}}
		<div class="col-lg-6 text-center">
			<div class="alert alert-info" role="alert">
	          Menu link:<br> <a href="{{ $menu_link }}" target="_blank" class="alert-link">{{ $menu_link }}</a>
	        </div>
			<img class="img-thumbnail mb-4" src="https://cdn.ttgtmedia.com/rms/misc/qr_code_barcode.jpg" alt="">
			<div class="row">
				<div class="col-6">
					<button class="btn btn-outline-secondary w-100">Download PNG</button>
				</div>
				<div class="col-6">
					<button class="btn btn-outline-secondary w-100">Download JPG</button>
				</div>
			</div>
		</div>
		{{-- <div class="col-lg-1"></div> --}}
	</div>
</div>
@endsection
