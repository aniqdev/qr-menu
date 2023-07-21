@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2>{{ __('admin_settings.company_settings') }}</h2>
	<div class="row">

		<div class="col-lg-4">
			<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('profile.update') }}">
				@csrf
				@method('PUT')
				<div class="col-12 mb-3">
					<label for="item_price" class="form-label">{{ __('admin_profile.name') }}</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-12 mb-3">
					<label for="item_old_price" class="form-label">{{ __('admin_profile.email') }}</label>
					<input type="text" name="email" value="{{ $user->email }}" class="form-control" id="item_old_price" placeholder="">
				</div>
				<div class="col-12 mb-3">
					<label for="item_category" class="form-label">{{ __('admin_profile.lang') }}</label>
					<select name="lang" class="form-select" id="item_category">
						<option value="en" {{ $user->lang !== 'en' ?: 'selected' }} style="background-image:url('/images/flags/en.png');">
							English
						</option>
						<option value="ru" {{ $user->lang !== 'ru' ?: 'selected' }} style="background-image:url('/images/flags/ru.png');">
							Русский
						</option>
						<option value="uk" {{ $user->lang !== 'uk' ?: 'selected' }} style="background-image:url('/images/flags/uk.png');">
							Українська
						</option>
					</select>
				</div>
				{{-- <hr class=""> --}}
				<div class="col mb-3">
					<button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
				</div>
			</form>
		</div>

		<div class="col-lg-4">
			<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('profile.update-password') }}">
				@csrf
				@method('PUT')
					<div class="col-12 mb-3">
						<label for="password" class="form-label">{{ __('admin_profile.password') }}</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="">
					</div>
					<div class="col-12 mb-3">
						<label for="password_confirmation" class="form-label">{{ __('admin_profile.password_confirmation') }}</label>
						<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="">
					</div>
					{{-- <hr class=""> --}}
					<div class="col mb-3">
						<button type="submit" class="btn btn-primary">{{ __('admin_profile.update_password') }}</button>
					</div>
			</form>
		</div>

		<div class="col-lg-4">
			<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('company.update') }}">
				@csrf
				@method('PUT')
				<div class="col-12 mb-3">
					<label for="item_price" class="form-label">{{ __('admin_company.name') }}</label>
					<input type="text" name="name" value="{{ $company->name }}" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-12 mb-3">
					<label for="item_old_price" class="form-label">{{ __('admin_company.slug') }}</label>
					<input type="text" name="slug" value="{{ $company->slug }}" class="form-control" id="item_old_price" placeholder="">
				</div>
				<div class="col-12 mb-3">
					<label for="item_category" class="form-label">{{ __('admin_company.menu_template') }}</label>
					<select name="menu_template" class="form-select" id="item_category">
						@foreach($templates as $template)
						<option value="{{ $template }}" {{ $company->menu_template !== $template ?: 'selected' }}>
							{{ $template }}
						</option>
						@endforeach
					</select>
				</div>
				<div class="col mb-3">
					<button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
				</div>
			</form>
		</div>

	</div>
</div>
@endsection
