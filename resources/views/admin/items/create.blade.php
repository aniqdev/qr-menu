@extends('layouts.back')

@section('content')

<div class="shadow-block">
	<h2>Add new dish</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.store') }}">
		@csrf
		<div class="col-md-4">
			@include('admin.blocks.image-input')
			<hr>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<div class="col-md-8">

			<label for="item_title" class="form-label">Name</label>
			<input type="text" name="name" class="form-control" id="item_title" placeholder="Vine">

			<br>
			<div class="row">
				<div class="col-3">
					<label for="item_price" class="form-label">Price</label>
					<input type="text" name="price" class="form-control" id="item_price" placeholder="Vine">
				</div>
				<div class="col-3">
					<label for="item_old_price" class="form-label">Old price</label>
					<input type="text" name="old_price" class="form-control" id="item_old_price" placeholder="Vine">
				</div>
				<div class="col-6">
					<label for="item_category" class="form-label">Category</label>
					<select name="category_id" class="form-select" id="item_category">
						<option value="">Hidden</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<br>
			<label for="description" class="form-label">Description</label>
			<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril."></textarea>
		</div>
	</form>
</div>
<script>
// only to show where is the drop-zone:
$('#item_image_label').on('dragenter', function() {
  this.classList.add('dragged-over');
})
 .on('dragend drop dragexit dragleave', function() {
  this.classList.remove('dragged-over');
});
</script>
@endsection
