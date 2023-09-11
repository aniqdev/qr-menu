@extends('layouts.back')

@section('content')
<style>
.category-item{
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, 0.125);
}
</style>
<div class="shadow-block">
    @include('admin.blocks.breadcrumbs', [
        'breadcrumbs' => [
            ['id' => 'breadcrumb_categories', 'href' => route('categories.index'), 'label' => _t('breadcrumbs.categories'), 'title' => _t('breadcrumbs.categories')],
        ]
    ])
    <h2 class="d-flex">
        {{ _t('admin_categories.categories') }}
        <a href="{{ route('categories.create') }}" class="ms-auto btn btn-outline-primary">{{ _t('admin_categories.create') }} <i class="bi bi-plus-square"></i></a>
    </h2>
    <hr>
    <div class="sortable" data-route="{{ route('categories.update-sorting') }}">
        @foreach($categories as $category)
            <div class="row justify-content-between sortable-item py-2 category-item" data-id="{{ $category->id }}">

                <div class="col-4 col-lg-3 d-flex">
                    

                    {{-- image --}}
                    <div class="position-relative" style="margin-left: -13px; margin-right: -13px;">
                        {{-- sorting --}}
                        <div class="col_ position-absolute">
                            <span class="btn btn-outline-secondary sortable-handle me-2"
                                style="background-color: #ffffffb5;"><i class="bi bi-arrows-move"></i></span>
                        </div>
                        <a href="{{ route('categories.edit', $category) }}" class="js-no-reload-link">
                            <img src="{{ $category->image_small }}" alt=""
                                style="max-width:100%; max-height:100px;">
                        </a>
                    </div>

                </div>

                <div class="col-8 col-lg-9">

                    {{-- name --}}
                    <div class="d-flex align-items-center">
                        <a href="{{ route('categories.edit', $category) }}" class="js-no-reload-link text-truncate">
                            {{ $category->name }}
                        </a>
                        @include('admin.categories.blocks.item-dropdown')
                    </div>

                    {{-- desription --}}
                    <div class="col-auto_">
                        <div data-bs-toggle="tooltip" data-bs-title="{{ $category->description }}">
                            {{ mb_substr($category->description, 0, 50) }}
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
        {{-- <div class="ui-sortable-placeholder ui-placeholder">placeholder</div> --}}
    </div>
</div>
@endsection
