@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <div class="row js-no-reload">
        <div class="col text-end">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Create <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <hr>
    <div class="sortable" data-route="{{ route('categories.update-sorting') }}">
        @foreach($categories as $category)
            <div class="row justify-content-between sortable-item py-2" data-id="{{ $category->id }}">
                <div class="col-auto">
                    <span class="btn btn-outline-secondary sortable-handle me-2"><i class="bi bi-arrows-move"></i></span>
                </div>
                <div class="col-auto js-no-reload">
                    <a href="{{ route('categories.edit', $category) }}">
                        <img src="{{ $category->image_small }}" alt="" style="max-width:50px; max-height:40px;">
                    </a>
                </div>
                <div class="col js-no-reload">
                    <a href="{{ route('categories.edit', $category) }}">
                        <span class="text-truncate">{{ $category->name }}</span>
                    </a>
                </div>
                <div class="col-auto">
                    <div data-bs-toggle="tooltip" data-bs-title="{{ $category->description }}">
                        {{ mb_substr($category->description, 0, 50) }}
                    </div>
                </div>
                <div class="col-auto">
                    <div class="text-end js-no-reload" role="group" aria-label="Basic example">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-info" title="edit category">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" class="d-inline" 
                                onsubmit="if(!confirm('Delete category?')) return false; submit_form(this, event) ">
                                @method('delete') @csrf
                            <button type="submit" class="btn btn-outline-danger" title="delete category">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </form>
                    </div>
                    <form action="{{ route('categories.destroy', $category) }}"></form>
                </div>
            </div>
        @endforeach
        {{-- <div class="ui-sortable-placeholder ui-placeholder">placeholder</div> --}}
    </div>
</div>
@endsection
