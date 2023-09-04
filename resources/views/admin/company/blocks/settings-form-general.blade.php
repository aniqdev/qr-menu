
<div class="row">

	<div class="col-lg-12">
		<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('company.update') }}">
			@csrf
			@method('PUT')
			<div class="col-sm-3">
				@include('admin.blocks.image-input', ['model' => $company])
			</div>
			<div class="col-sm-5">
				<div class="col-6_ mb-3">
					<label for="company_name" class="form-label">{{ _t('admin_company.name') }}</label>
					<input type="text" name="name" value="{{ $company->name }}" class="form-control" id="company_name" placeholder="">
				</div>
				<div class="col-6_ mb-3">
					<label for="company_slug" class="form-label">{{ _t('admin_company.slug') }}</label>
					<input type="text" name="slug" value="{{ $company->slug }}" class="form-control" id="company_slug" placeholder="">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="col-4_ mb-3">
					<label for="item_category" class="form-label">{{ _t('admin_company.menu_template') }}</label>
					<select name="menu_template" class="form-select" id="item_category">
						@foreach($templates as $template)
						<option value="{{ $template }}" {{ $company->menu_template !== $template ?: 'selected' }}>
							{{ ucfirst(str_replace('_', '.', $template)) }}
						</option>
						@endforeach
					</select>
				</div>
				<div class="col-4_ mb-3">
					<label for="company_type" class="form-label">
						{{ _t('admin_company.company_type') }}
						<i class="bi bi-question-circle-fill" title="{{ _t('admin_settings.company_settings_company_type') }}" data-bs-toggle="tooltip"></i>
					</label>
					<select name="company_type" class="form-select" id="company_type">
						<option value="cafe" {{ $company->company_type !== 'cafe' ?: 'selected' }}>Cafe</option>
						<option value="bar" {{ $company->company_type !== 'bar' ?: 'selected' }}>Bar</option>
						<option value="restaurant" {{ $company->company_type !== 'restaurant' ?: 'selected' }}>Restaurant</option>
					</select>
				</div>
				<div class="col-4_ mb-3">
					<label for="link_target" class="form-label">
						{{ _t('admin_company.link_target') }}
						<i class="bi bi-question-circle-fill" title="{{ _t('admin_settings.company_settings_links_page') }}" data-bs-toggle="tooltip"></i>
					</label>
					<select name="link_target" class="form-select" id="link_target">
						<option value="menu" {{ $company->link_target !== 'menu' ?: 'selected' }}>Menu</option>
						<option value="links_page" {{ $company->link_target !== 'links_page' ?: 'selected' }} disabled>Links page</option>
					</select>
				</div>
			</div>
			<div class="col-12 mb-3">
				<button type="submit" class="btn btn-primary">{{ _t('admin.save') }}</button>
			</div>
		</form>
	</div>

</div>