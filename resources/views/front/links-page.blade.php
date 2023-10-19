@extends('layouts.bootstrap')

@section('content')
<div class="shadow-block">
	<div class="text-center">
		<a href="#" class="img-thumbnail text-center d-inline-block" style="max-width: 300px;">
			<img src="{{ $company->image }}"
				style="max-width: 100%;">
		</a>
		<div class="row align-items-center justify-content-center">
			<div class="col-sm-6 mt-3">
				<a href="{{ route('cafe.menu', $company->slug) }}" class="img-thumbnail text-center d-inline-block" style="max-width: 300px;">
					<img style="max-width: 100%;" src="https://www.merchantsmarket.com/wp-content/uploads/2018/01/menu.png" alt="">
				</a>
			</div>
			<div class="col-sm-6 mt-3">
				<a href="#" class="img-thumbnail text-center d-inline-block" style="max-width: 300px;">
					<img style="max-width: 100%;" src="https://risingstarreviews.com/wp-content/uploads/google-review-link.jpg" alt="">
				</a>
			</div>
		</div>
	</div>
</div>
@endsection