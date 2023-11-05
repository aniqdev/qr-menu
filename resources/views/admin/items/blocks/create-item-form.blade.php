<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.store') }}" id="create_item_form">
	@csrf
	<div class="col-md-4">
		@include('admin.blocks.image-input')
		<br>
		<button type="submit" class="btn btn-primary mt-3">{{ _t('admin.save') }}</button>
	</div>
	<div class="col-md-8">
	<div class="row">
		<div class="col-12 col-sm-7 mb-3">
			<label for="item_title" class="form-label d-flex justify-content-between">
				{{ _t('admin_items.name') }}
				<label for="is_active" class="">
					{{ _t('admin_items.is_active') }}
					<input class="form-check-input" type="checkbox" name="is_active" value="" id="is_active" checked style="width: 25px; height: 25px; margin: 0;">
				</label>
			</label>
			<input type="text" name="name" class="form-control" id="item_title" placeholder="Vine">
		</div>
		<div class="col-12 col-sm-5">
			<label for="item_category" class="form-label">{{ _t('admin_items.category') }}</label>
			<select name="category_id" class="form-select" id="item_category">
				<option value="">{{ _t('admin_items.hidden_category') }}</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ request('category_id') != $category->id ?: 'selected' }}>{{ $category->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="col prices">
			<div class="prices-row row">
				<div class="col-5">
					<label for="item_price" class="form-label">{{ _t('admin_items.price') }}</label>
					<input type="number" name="prices[]" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-5">
					<label for="item_volume" class="form-label">{{ _t('admin_items.volume') }}</label>
					<input type="text" name="volumes[]" class="form-control" id="item_volume" placeholder="" list="volumes">
				</div>
				<div class="col-2">
					<label for="" class="form-label">&nbsp;</label>
					<button type="button" class="btn btn-outline-danger w-100 px-0 text-center"
						onclick="if($('.prices-row').length > 1) $(this).closest('.prices-row').remove()" 
					>
						<i class="bi bi-x-square"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="col-12">
			<button type="button" class="btn btn-sm btn-outline-success mt-3"
				onclick="$('.prices-row').last().clone().prependTo('.prices')"
			><i class="bi bi-plus-square me-2"></i>{{ _t('admin_items.add_variant') }}</button>
		</div>

{{-- 		<div class="col-6">
			<label for="item_price" class="form-label">{{ _t('admin_items.price') }}</label>
			<input type="text" name="price" class="form-control" id="item_price" placeholder="100">
		</div>
		<div class="col-6">
			<label for="item_volume" class="form-label">{{ _t('admin_items.volume') }}</label>
			<input type="text" name="volume" class="form-control" id="item_volume" placeholder="" list="volumes">
		</div> --}}
		<div class="col-12 mt-3">
			<label for="description" class="form-label">{{ _t('admin_items.description') }}</label>
			<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril."></textarea>
		</div>
	</div>
	<datalist id="volumes">
	  <option value="{{ _t('volumes.50ml') }}">
	  <option value="{{ _t('volumes.100ml') }}">
	  <option value="{{ _t('volumes.500ml') }}">
	  <option value="{{ _t('volumes.100g') }}">
	</datalist>
</form>