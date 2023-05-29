@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<h2 class="text-truncate">Edit category - {{ $category->name }}</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('categories.update', $category) }}">
		@csrf
		@method('PUT')
		<div class="col-md-4">
			<label>
				<img class="img-thumbnail" src="{{ $category->image_medium }}" alt="">
				<input type="file" name="image" class="d-none image-input" accept=".jpg, .jpeg, .png, .webp">
			</label>
			<hr>
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
		<div class="col-md-8">
			<label for="item_title" class="form-label">Name</label>
			<input type="text" name="name" value="{{ $category->name }}" class="form-control" id="item_title" placeholder="Vine">
			<br>
			<label for="description" class="form-label">Description</label>
			<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril.">{{ $category->description }}</textarea>
			@if($category->items->count())
			    <hr>
			    <h4>Dishes</h4>
			    <ul class="list-group sortable" data-route="{{ route('items.update-sorting') }}">
			    @foreach($category->items as $item)
				  <li class="list-group-item sortable-item d-flex" data-id="{{ $item->id }}">
				  	<div class="col js-no-reload">
				  		<span class="btn btn-outline-secondary sortable-handle me-2"><i class="bi bi-arrows-move"></i></span>
				  		<a href="{{ route('items.edit', $item) }}" class="text-truncate">{{ $item->name }}</a>
				  	</div>
				  	<div class="col-auto me-3">{{ $item->price }}</div>
				  	<div class="col-auto js-no-reload">
				  		<a href="{{ route('items.edit', $item) }}" class="btn btn-outline-info">
				  			<i class="bi bi-pencil"></i>
				  		</a>
				  	</div>
				  </li>
			    @endforeach
			    {{-- example of placeholder list item --}}
			  	{{-- <li class="ui-sortable-placeholder list-group-item ui-placeholder">ui-placeholder</li> --}}
			  </ul>
			@endif
		</div>
	</form>
</div>
@endsection
