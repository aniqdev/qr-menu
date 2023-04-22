@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2>Edit - {{ $item->name }}</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
		@csrf
		@method('PUT')
		<div class="col-md-4">
			<img class="img-thumbnail" src="{{ $item->image ?? '/images/img-placeholder.png' }}" alt="">
			<hr>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<div class="col-md-8">

			<label for="item_title" class="form-label">Name</label>
			<input type="text" name="name" value="{{ $item->name }}" class="form-control" id="item_title" placeholder="Vine">

			<br>
			<div class="row">
				<div class="col-6 col-sm-3">
					<label for="item_price" class="form-label">Price</label>
					<input type="number" name="price" value="{{ $item->price }}" class="form-control" id="item_price" placeholder="">
				</div>
				<div class="col-6 col-sm-3">
					<label for="item_old_price" class="form-label">Old price</label>
					<input type="number" name="old_price" value="{{ $item->old_price }}" class="form-control" id="item_old_price" placeholder="">
				</div>
				<div class="col-12 col-sm-6">
					<label for="item_category" class="form-label">Category</label>
					<select name="category_id" class="form-select" id="item_category">
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id !== $item->category_id ?: 'selected' }}>{{ $category->name }}</option>
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
@endsection
