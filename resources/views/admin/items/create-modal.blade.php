<div class="modal-header">
	<h1 class="modal-title fs-5" id="universalModalLabel">{{ _t('admin_item.add_new') }}</h1>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.store') }}" id="modal_create_item_form">
		@csrf
		<input type="hidden" name="go_to_category_edit" value="{{ $selectedCategory }}">
		<div class="col-md-4">
			@include('admin.blocks.image-input')
		</div>
		<div class="col-md-8">

			<label for="item_title" class="form-label">{{ _t('admin_item.name') }}</label>
			<input type="text" name="name" class="form-control" id="item_title" placeholder="Vine">

			<br>
			<div class="row">
				<div class="col-6">
					<label for="item_price" class="form-label">{{ _t('admin_item.price') }}</label>
					<input type="text" name="price" class="form-control" id="item_price" placeholder="100">
				</div>
				{{-- <div class="col-3">
					<label for="item_old_price" class="form-label">{{ _t('admin_item.old_price') }}</label>
					<input type="text" name="old_price" class="form-control" id="item_old_price" placeholder="Vine">
				</div> --}}
				<div class="col-6">
					<label for="item_category" class="form-label">{{ _t('admin_item.category') }}</label>
					<select name="category_id" class="form-select" id="item_category">
						<option value="">{{ _t('admin_item.hidden_category') }}</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id != $selectedCategory ?: 'selected' }}>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<br>
			<label for="description" class="form-label">{{ _t('admin_item.description') }}</label>
			<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril."></textarea>
		</div>
	</form>
</div>
<div class="modal-footer">
	{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="universalModal">Close</button> --}}
	<button type="button" class="btn btn-primary" onclick="$('#modal_create_item_form').submit()">Save changes</button>
</div>