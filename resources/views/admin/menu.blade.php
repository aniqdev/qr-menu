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
.template-link{
	border: 2px solid transparent;
    display: block;
    border-radius: 8px;
}
.template-link.active{
	border-color: #5a88af;
}
.choose-template-controls{
	border: 2px solid #dee2e6;
    border-radius: 8px;
}
.choose-template-controls.active{
	border: 2px solid orange;
}
</style>

<div class="shadow-block" id="admin_menu_page">
	<div class="row mb-2_">
		<div class="col-sm-3 mb-3 mb-sm-0">
			{{-- <select class="form-select" id="templates_select" onchange="go_to_page(this.value)">
				@foreach($templates as $template)
				<option {{ $template === $choosenTemplate ? 'selected' : '' }} value="?template={{ $template }}">
					{{ ucfirst(str_replace('_', '.', $template)) }}
				</option>
				@endforeach
			</select> --}}
		</div>
		<div class="col-8 col-sm-6">
			{{-- <button type="button" class="btn btn-outline-secondary" onclick="admin_menu_open_settings('{{ $choosenTemplate }}')">
				<i class="bi bi-gear"></i>
			</button> --}}
			{{-- <button class="btn btn-primary">Set this template</button> --}}
		</div>
		<div class="col-4 col-sm-3 text-end d-none d-md-block">
			<button class="btn btn-primary set-view" onclick="admin_menu_set_view('desktop', this)">
				<i class="bi bi-pc-display-horizontal"></i>
			</button>
			<button class="btn btn-light set-view" onclick="admin_menu_set_view('mobile', this)">
				<i class="bi bi-phone"></i>
			</button>
		</div>
		<div class="col-12">
			<div class="templates-carousel owl-carousel owl-theme my-4">
				@foreach($templates as $template)
				<div class="template-link-wrapper">
					<a href="?template={{ $template }}" class="template-link js-no-reload-link {{ $choosenTemplate !== $template ?: 'active' }}">
						<img class="img-thumbnail" src="/images/template-screenshot-{{ $template }}.jpg" alt="" width="120">
					</a>
					<div class="mt-3">
						<div class="choose-template-controls btn-group {{ $companyTemplate !== $template ?: 'active' }}" style="width: 100%;" id="template_controls_{{ $template }}">
						  <button type="button" class="btn btn-primary" onclick="$(this).closest('div').find('form').submit()">Set this template</button>
						  <form class="text-truncate" onsubmit="submit_form(this, event)" action="{{ route('companies.set-template', $company) }}">
						  	@csrf
						  	<input type="hidden" name="template" value="{{ $template }}">
						  </form>
						  <button type="button" class="btn btn-outline-secondary" onclick="admin_menu_open_settings('{{ $template }}')">
						  	<i class="bi bi-gear"></i>
						  </button>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

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
