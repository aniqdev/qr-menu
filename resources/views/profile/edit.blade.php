@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2>{{ __('admin_profile.edit_profile') }}</h2>
	<div class="row">
		<div class="col-12">
			<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('profile.update', $user) }}">
				@csrf
				@method('PUT')
				<div class="col-12 col-sm-4 mb-3">
					<label for="item_price" class="form-label">{{ __('admin_profile.name') }}</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-12 col-sm-4 mb-3">
					<label for="item_old_price" class="form-label">{{ __('admin_profile.email') }}</label>
					<input type="text" name="email" value="{{ $user->email }}" class="form-control" id="item_old_price" placeholder="">
				</div>
				<div class="col-12 col-sm-4 mb-3">
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
				<hr class="">
				<div class="col">
					<button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
