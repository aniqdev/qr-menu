@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <div class="row js-no-reload">
        <div class="col-sm-8">
            {{ $categories->links() }}
        </div>
        <div class="col-sm-4 text-end">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Create <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <table class="table table-striped sortable">
        @foreach($categories as $category)
            <tr class="sortable-item">
                <td>
                    <span class="btn btn-outline-secondary sortable-handle me-2"><i class="bi bi-arrows-move"></i></span>
                </td>
                <td>
                    <img src="{{ $category->image }}" alt="" style="max-width:50px; max-height:50px;">
                </td>
                <td>
                    <span class="text-truncate">{{ $category->name }}</span>
                </td>
                <td>
                    <div data-bs-toggle="tooltip" data-bs-title="{{ $category->description }}">
                        {{ mb_substr($category->description, 0, 50) }}
                    </div>
                </td>
                <td>
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
                </td>
            </tr>
        @endforeach
    </table>
    <div class="js-no-reload bottom-pagination-wrapper">
        {{ $categories->links() }}
    </div>
</div>
@endsection
