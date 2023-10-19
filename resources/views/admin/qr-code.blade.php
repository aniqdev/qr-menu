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
.qr-radio{

}
</style>

<div class="shadow-block">
	<h2>{{ _t('admin_qr.qr_code') }}</h2>
	<hr>
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 text-center">
			<div class="alert alert-info" role="alert" onclick="go_to_page('?company_type=cafe')">
	          <input type="radio" class="qr-radio me-3" {{ $companyType === 'cafe' ? 'checked' : '' }}>
	          <a href="{{ $company->cafeLink() }}" target="_blank" class="alert-link">{{ $company->cafeLink() }}</a>
	        </div>
			<div class="alert alert-info" role="alert" onclick="go_to_page('?company_type=bar')">
	          <input type="radio" class="qr-radio me-3" {{ $companyType === 'bar' ? 'checked' : '' }}>
	          <a href="{{ $company->barLink() }}" target="_blank" class="alert-link">{{ $company->barLink() }}</a>
	        </div>
			<div class="alert alert-info" role="alert" onclick="go_to_page('?company_type=restaurant')">
	          <input type="radio" class="qr-radio me-3" {{ $companyType === 'restaurant' ? 'checked' : '' }}>
	          <a href="{{ $company->restaurantLink() }}" target="_blank" class="alert-link">{{ $company->restaurantLink() }}</a>
	        </div>
	        <div class="img-thumbnail mb-4 position-relative">
		        <img src="/images/loading-icon-with-text.jpg" alt="">
				<img class="w-100 qr-image" src="{{ route('admin.cafe-qr-code-image') }}?company_type={{ request('company_type', 'cafe') }}" alt="" style="max-width: 70%; image-rendering: pixelated;">
			</div>
			<div class="row mb-4">
				<div class="col-12">
					<a href="{{ route('admin.cafe-qr-code-image') }}?company_type={{ request('company_type', 'cafe') }}" download="{{ $company->slug }}-cafe.png" class="btn btn-primary w-100">{{ _t('admin_qr.download_png') }}</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
