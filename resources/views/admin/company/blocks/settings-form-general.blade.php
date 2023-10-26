
<div class="row">

	<div class="col-lg-12">
		<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('company.update') }}">
			@csrf
			@method('PUT')
			<div class="col-sm-3">
				<label class="form-label d-block">{{ _t('admin_company.logo') }}</label>
				@include('admin.blocks.image-input', ['model' => $company])
			</div>
			<div class="col-sm-9">
				<div class="mb-3">
					<label for="company_name" class="form-label">{{ _t('admin_company.name') }}</label>
					<input type="text" name="name" value="{{ $company->name }}" class="form-control" id="company_name" placeholder="">
				</div>
				<div class="mb-3">
					<label for="company_slug" class="form-label">{{ _t('admin_company.slug') }}</label>
					<input type="text" name="slug" value="{{ $company->slug }}" class="form-control" id="company_slug" placeholder="">
				</div>
				<button type="button" class="btn btn-outline-secondary my-3" onclick="admin_menu_open_settings('{{ $company->menu_template }}')">
					<span>{{ _t('admin_company.template_settings') }}</span>
				  	<i class="bi bi-gear"></i>
				</button>
				{{-- <hr>
				<h4>Contacts</h4>
				<div class="mb-3">
					<label for="company_phone" class="form-label">{{ _t('admin_company.phone') }}</label>
					<input type="text" name="settings[phone]" value="{{ $company->name }}" class="form-control" id="company_phone" placeholder="+38 050 1234567">
				</div>
				<div class="mb-3">
					<label for="company_email" class="form-label">{{ _t('admin_company.email') }}</label>
					<input type="text" name="settings[email]" value="{{ $company->name }}" class="form-control" id="company_email" placeholder="example@gmail.com">
				</div>
				<div class="mb-3">
					<label for="company_email" class="form-label">{{ _t('admin_company.telegram') }}</label>
					<input type="text" name="settings[telegram]" value="{{ $company->name }}" class="form-control" id="company_email" placeholder="">
				</div>
				<div class="mb-3">
					<label for="company_email" class="form-label">{{ _t('admin_company.instagram') }}</label>
					<input type="text" name="settings[instagram]" value="{{ $company->name }}" class="form-control" id="company_email" placeholder="">
				</div>
				<div class="mb-3">
					<label for="company_email" class="form-label">{{ _t('admin_company.facebook') }}</label>
					<input type="text" name="settings[facebook]" value="{{ $company->name }}" class="form-control" id="company_email" placeholder="">
				</div>
				<div class="mb-3">
					<label for="company_email" class="form-label">{{ _t('admin_company.working_hours') }}</label>
					<input type="text" name="settings[working_hours]" value="{{ $company->name }}" class="form-control" id="company_email" placeholder="">
				</div>
				<div class="mb-3">
					<label for="description" class="form-label">{{ _t('admin_categories.google_maps') }}</label>
					<textarea name="description" class="form-control" id="description" rows="3" placeholder="Insert iframe code here ..."></textarea>
				</div> --}}
			</div>
			<div class="col-sm-4"> {{-- hidden --}}
				<div class="mb-3 d-none">
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