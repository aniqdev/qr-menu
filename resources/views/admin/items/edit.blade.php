@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2>{{ _t('admin_item.edit') }} - {{ $item->name }}</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
		@csrf @method('PUT')
		<div class="col-md-4">
			@include('admin.blocks.image-input', ['model' => $item])
			<hr>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-12 mb-3">
					<label for="item_title" class="form-label d-flex justify-content-between">
						{{ _t('admin_item.name') }}
						<label for="is_active" class="form-label">
							{{ _t('admin_item.is_active') }}
							<input class="form-check-input" type="checkbox" name="is_active" value="" id="is_active" {{ !$item->is_active ?: 'checked' }} style="width: 25px; height: 25px; margin: 0;">
						</label>
					</label>
					<input type="text" name="name" value="{{ $item->name }}" class="form-control" id="item_title" placeholder="Vine">
				</div>
				<div class="col-6 col-sm-6">
					<label for="item_price" class="form-label">{{ _t('admin_item.price') }}</label>
					<input type="number" name="price" value="{{ $item->price }}" class="form-control" id="item_price" placeholder="">
				</div>
				{{-- <div class="col-6 col-sm-3">
					<label for="item_old_price" class="form-label">{{ _t('admin_item.old_price') }}</label>
					<input type="number" name="old_price" value="{{ $item->old_price }}" class="form-control" id="item_old_price" placeholder="">
				</div> --}}
				<div class="col-12 col-sm-6">
					<label for="item_category" class="form-label">{{ _t('admin_item.category') }}</label>
					<select name="category_id" class="form-select" id="item_category">
						<option value="">{{ _t('admin_item.hidden_category') }}</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id !== $item->category_id ?: 'selected' }}>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 mt-3">
					<label for="description" class="form-label">Description</label>
					<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril.">{{ $item->description }}</textarea>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
