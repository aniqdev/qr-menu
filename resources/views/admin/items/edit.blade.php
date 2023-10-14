@extends('layouts.back')

@section('content')
<div class="shadow-block">
	@include('admin.blocks.breadcrumbs', [
		'breadcrumbs' => [
			['id' => 'breadcrumb_categories', 'href' => route('categories.index'), 'label' => _t('breadcrumbs.categories'), 'title' => _t('breadcrumbs.categories')],
			['id' => 'breadcrumb_category', 'href' => $item->category ? route('categories.edit', $item->category) : '#', 'label' => $item->category->name ?? 'No category', 'title' => 'Edit category - ' . ($item->category->name ?? 'No category')],
			['id' => 'breadcrumb_items', 'href' => route('items.index'), 'label' => _t('breadcrumbs.items'), 'title' => _t('breadcrumbs.items')],
			['id' => 'breadcrumb_item', 'href' => route('items.edit', $item), 'label' => $item->name, 'title' => 'Edit item - ' . $item->name],
		]
	])
	<h2>{{ _t('admin_items.edit') }} - {{ $item->name }}</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
		@csrf @method('PUT')
		<div class="col-md-4">
			@include('admin.blocks.image-input', ['model' => $item])
			<hr>
			<button type="submit" class="btn btn-primary">{{ _t('admin.update') }}</button>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-12 col-sm-7 mb-3">
					<label for="item_title" class="form-label d-flex justify-content-between">
						{{ _t('admin_items.name') }}
						<label for="is_active" class="">
							{{ _t('admin_items.is_active') }}
							<input class="form-check-input" type="checkbox" name="is_active" value="" id="is_active" {{ !$item->is_active ?: 'checked' }} style="width: 25px; height: 25px; margin: 0;">
						</label>
					</label>
					<input type="text" name="name" value="{{ $item->name }}" class="form-control" id="item_title" placeholder="Vine">
				</div>
				<div class="col-12 col-sm-5">
					<label for="item_category" class="form-label">{{ _t('admin_items.category') }}</label>
					<select name="category_id" class="form-select" id="item_category">
						<option value="">{{ _t('admin_items.hidden_category') }}</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id !== $item->category_id ?: 'selected' }}>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="col-6 col-sm-6">
					<label for="item_price" class="form-label">{{ _t('admin_items.price') }}</label>
					<input type="number" name="price" value="{{ $item->price }}" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-6 col-sm-6">
					<label for="item_volume" class="form-label">{{ _t('admin_items.volume') }}</label>
					<input type="text" name="volume" value="{{ $item->volume }}" class="form-control" id="item_volume" placeholder="" list="volumes">
					<datalist id="volumes">
					  <option value="{{ _t('volumes.50ml') }}">
					  <option value="{{ _t('volumes.100ml') }}">
					  <option value="{{ _t('volumes.500ml') }}">
					  <option value="{{ _t('volumes.100g') }}">
					</datalist>
				</div>
				{{-- <div class="col-6 col-sm-3">
					<label for="item_old_price" class="form-label">{{ _t('admin_items.old_price') }}</label>
					<input type="number" name="old_price" value="{{ $item->old_price }}" class="form-control" id="item_old_price" placeholder="">
				</div> --}}
				<div class="col-12 mt-3">
					<label for="description" class="form-label">{{ _t('admin_items.description') }}</label>
					<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril.">{{ $item->description }}</textarea>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
