@extends('layouts.back')

@section('content')
<style>
#menu_iframe{
	width: 100%;
	height: 800px;
	display: block;
	margin: auto;
	transition: width 0.3s ease-in-out;
}
#menu_iframe::-webkit-scrollbar {
		width: 10px;
}
#menu_iframe.mobile{
	width: 420px;
}
.btn-secondary{
/*	cursor: default;*/
	pointer-events:none;
}
#templates_select *{
	padding: 10px;
}
</style>

<div class="shadow-block" id="admin_menu_page">
	<div class="row mb-2">
		<div class="col-sm-3 mb-3">
			<select class="form-select" id="templates_select" onchange="go_to_page(this.value)">
				@foreach($templates as $template)
					<option {{ $template === $choosenTemplate ? 'selected' : '' }} value="?template={{ $template }}">{{ $template }}</option>
				@endforeach
			</select>
		</div>
		<div class="col-8 col-sm-6 mb-3">
			<button type="button" class="btn btn-outline-secondary" onclick="admin_menu_open_settings('{{ $choosenTemplate }}')">
				<i class="bi bi-gear"></i>
			</button>
			<button class="btn btn-primary">Set this template</button>
		</div>
		<div class="col-4 col-sm-3 text-end mb-3">
			<button class="btn btn-secondary set-view" onclick="admin_menu_set_view('desktop', this)">
				<i class="bi bi-pc-display-horizontal"></i>
			</button>
			<button class="btn btn-light set-view" onclick="admin_menu_set_view('mobile', this)">
				<i class="bi bi-phone"></i>
			</button>
		</div>
	</div>
{{-- 	<div class="row">
		<div class="col-sm-6 templates js-no-reload">
			@foreach($templates as $template)
				<div class="btn-group">
					<a href="{{ route('admin.menu') }}?template={{ $template }}" class="btn btn-{{ $template === $choosenTemplate ? 'secondary' : 'light' }}">{{ $template }}</a>
					<button type="button" class="btn btn-outline-secondary" onclick="admin_menu_open_settings('{{ $template }}')">
						<i class="bi bi-gear"></i>
					</button>
				</div>
			@endforeach
		</div>

		<div class="col-sm-2">
			<div class="btn btn-primary">Set this template</div>
		</div>

		<div class="col-sm-4 text-end">
			<button class="btn btn-secondary set-view" onclick="admin_menu_set_view('desktop', this)">
				<i class="bi bi-pc-display-horizontal"></i>
			</button>
			<button class="btn btn-light set-view" onclick="admin_menu_set_view('mobile', this)">
				<i class="bi bi-phone"></i>
			</button>
		</div>
	</div> --}}
	<hr>
	<iframe src="{{ route('restaurant.menu', $company->slug) }}?template={{ request('template', $choosenTemplate) }}" frameborder="0" id="menu_iframe"></iframe>
</div>


<!-- Modal -->
<div class="modal fade" id="menuSettingsModal" tabindex="-1" aria-labelledby="menuSettingsModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="menuSettingsModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="menuSettingsModalForm"></div>
			</div>
			<div class="modal-footer">
				{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="menuSettingsModal">Close</button> --}}
				<button type="button" class="btn btn-primary" onclick="$('#menuSettingsModalForm form').submit()">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection
