@extends('layouts.back')

@section('content')
<style>
iframe{
	width: 100%;
	height: 800px;
}
.btn-secondary{
/*	cursor: default;*/
	pointer-events:none;
}
</style>
<div class="shadow-block">
	<div class="row">
		<div class="col-sm-8 templates">
			@foreach($templates as $template)
				<a href="{{ route('back.menu') }}?template={{ $template }}" class="btn btn-{{ $template === request('template') ? 'secondary' : 'light' }}">{{ $template }}</a>
			@endforeach
		</div>
		<div class="col-sm-4 text-end">
			<button class="btn btn-secondary">
				<i class="bi bi-pc-display-horizontal"></i>
			</button>
			<button class="btn btn-light">
				<i class="bi bi-phone"></i>
			</button>
		</div>
	</div>
	<hr>
	<iframe src="{{ route('front.menu') }}?template={{ request('template', 'default') }}" frameborder="0"></iframe>
</div>
@endsection
