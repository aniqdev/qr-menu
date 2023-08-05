@extends('layouts.back')

@section('content')

<div class="shadow-block">
	<h2>{{ __('admin_settings.company_settings') }}</h2>
	<nav>
	    <div class="nav nav-tabs_ nav-pills mb-3" id="nav-tab" role="tablist">
	        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true">General settings</button>
	        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile settings</button>
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
@endsection
