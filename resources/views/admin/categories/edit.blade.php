@extends('layouts.back')

@section('content')
<style>
.sortable-handle{
	margin-left: -15px;
    margin-right: -15px;
    border: 0;
}
</style>
<div class="shadow-block">
	@include('admin.blocks.breadcrumbs', [
		'breadcrumbs' => [
			['id' => 'breadcrumb_categories', 'href' => route('categories.index'), 'label' => _t('breadcrumbs.categories'), 'title' => _t('breadcrumbs.categories')],
			['id' => 'breadcrumb_category', 'href' => route('categories.edit', $category), 'label' => $category->name, 'title' => 'Edit category - ' . $category->name],
		]
	])
	<h2 class="text-truncate">{{ _t('admin_categories.edit') }} - {{ $category->name }}</h2>
	<form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('categories.update', $category) }}">
		@csrf
		@method('PUT')
		<div class="col-md-4">
			@include('admin.blocks.image-input', ['model' => $category])
		</div>
		<div class="col-md-8">
			<label for="item_title" class="form-label">{{ _t('admin_categories.name') }}</label>
			<input type="text" name="name" value="{{ $category->name }}" class="form-control" id="item_title" placeholder="Vine">
			<br>
			<label for="description" class="form-label">{{ _t('admin_categories.description') }}</label>
			<textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril.">{{ $category->description }}</textarea>
			<br>
			<button type="submit" class="btn btn-primary">{{ _t('admin.save') }}</button>
		</div>
	</form>
			@if(true || $category->items->count())
			    <hr>
			    <h4 class="d-flex align-items-center">
			    	{{ _t('admin_categories.dishes') }}
			    	<a href="{{ route('items.create') }}" class="ms-auto btn btn-outline-primary" 
			    			onclick="modal_load(event, this)"
			    			data-modalurl="{{ route('items.load-create-modal', ['category' => $category->id]) }}"
			    			data-modalsize="modal-lg">
			    		{{ _t('admin_categories.add_item') }}
			    		<i class="bi bi-plus-square"></i>
			    	</a>
			    </h4>
			    <ul class="list-group sortable" data-route="{{ route('items.update-sorting') }}">
			    @foreach($category->items as $item)
				  <li class="list-group-item sortable-item d-flex align-items-center" data-id="{{ $item->id }}">
				  	<div class="col-auto me-3">
				  		<span class="btn btn-outline-secondary sortable-handle"><i class="bi bi-arrows-move"></i></span>
				  	</div>
				  	<div class="col me-auto pe-3" style="min-width: 0;" title="{{ $item->description }}">
				  		<a href="{{ route('items.edit', $item) }}" class="text-truncate mw-100 d-block js-no-reload-link">{{ $item->name }}</a>
				  		<small class="text-truncate mw-100 d-block">{{ $item->description }}</small>
				  	</div>
				  	<div class="col-auto me-3">{{ $item->price }}</div>
				  	<div class="col-auto">
				  		@include('admin.items.blocks.item-dropdown')
				  	</div>
				  </li>
			    @endforeach
			    {{-- example of placeholder list item --}}
			  	{{-- <li class="ui-sortable-placeholder list-group-item ui-placeholder">ui-placeholder</li> --}}
			  </ul>
			@endif
</div>
@endsection
