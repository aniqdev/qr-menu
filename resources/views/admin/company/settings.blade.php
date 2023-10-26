@extends('layouts.back')

@section('content')

<div class="shadow-block">
	<h2>{{ _t('admin_settings.company_settings') }}</h2>
	<nav>
	    <div class="nav nav-tabs_ nav-pills mb-3" id="nav-tab" role="tablist">
	        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true">{{ _t('admin_company.general_settings') }}</button>
	        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{ _t('admin_company.profile_settings') }}</button>
	        {{-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> --}}
	    </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	    <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
	    	@include('admin.company.blocks.settings-form-general')
	    </div>
	    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	    	@include('admin.company.blocks.settings-form-profile')
	    </div>
	    {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> --}}
	</div>

</div>

<!-- menuSettingsModal -->
<div class="modal fade" id="menuSettingsModal" tabindex="-1" aria-labelledby="menuSettingsModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="menuSettingsModalLabel">...</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="menuSettingsModalForm"></div>
			</div>
			<div class="modal-footer">
				{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="menuSettingsModal">Close</button> --}}
				<button type="button" class="btn btn-primary" onclick="$('#menuSettingsModalForm form').submit()">{{ _t('admin.save') }}</button>
			</div>
		</div>
	</div>
</div>
@endsection
