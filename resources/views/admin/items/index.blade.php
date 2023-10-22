@extends('layouts.back')

@section('content')
<style>
.item-item{
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, 0.125);
}
.item-left{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
</style>
<div class="shadow-block">
    @include('admin.blocks.breadcrumbs', [
        'breadcrumbs' => [
            ['id' => 'breadcrumb_categories', 'href' => route('categories.index'), 'label' => _t('breadcrumbs.categories'), 'title' => _t('breadcrumbs.categories')],
            ['id' => 'breadcrumb_items', 'href' => route('items.index'), 'label' => _t('breadcrumbs.items'), 'title' => _t('breadcrumbs.items')],
        ]
    ])
    <h2 class="d-flex">
        {{ _t('admin_items.items') }}
        <a href="{{ route('items.create') }}" class="ms-auto btn btn-outline-primary">
            {{ _t('items.create') }} <i class="bi bi-plus-square"></i>
        </a>
    </h2>
    <div class="row js-no-reload">
        <div class="col pagination-wrapper overflow-auto">
            {{ $items->links() }}
        </div>
    </div>
    <hr>
    <div class="item-list">
        @foreach($items as $item)
            <div class="row item-item">
                <div class="col-4 col-sm-3 col-md-2 item-left">
                    <a href="{{ route('items.edit', $item) }}" class="d-block js-no-reload-link">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" 
                        class="d-block m-auto" style="max-width:100%; max-height:100px;">
                    </a>
                    <form action="{{ route('items.update-visibility', $item) }}" onsubmit="submit_form(this, event)">
                        @csrf
                        @if($item->is_active)
                            <button type="submit" class="btn badge bg-success text-white w-100" id="item_{{ $item->id }}_visibility_badge">Active</button>
                        @else
                            <button type="submit" class="btn badge bg-secondary text-white w-100" id="item_{{ $item->id }}_visibility_badge">Hidden</button>
                        @endif
                    </form>
                </div>
                <div class="col-8 col-sm-9 col-md-10">

                    <div class="row">

                        {{-- name --}}
                        <div class=" d-flex align-items-center item-name mb-lg-2">
                            <a href="{{ route('items.edit', $item) }}" class="text-truncate  js-no-reload-link">
                                {{ $item->name }}
                            </a>
                            {{-- <span class="ms-2">
                                @if($item->is_active)
                                    <i class="bi bi-eye-fill" style="color: #5a88af;"></i>
                                @else
                                    <i class="bi bi-eye-slash"></i>
                                @endif
                            </span> --}}
                            @include('admin.items.blocks.item-dropdown')
                        </div>

                        {{-- prices --}}
                        <div class="order-2 col-lg-3">
                            <form class="input-group" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
                                <input class="form-control pe-0" type="number" name="price" value="{{ $item->price }}" title="{{ _t('item.price') }}">
                                {{-- <input class="form-control pe-0" type="number" name="old_price" value="{{ $item->old_price }}" title="{{ _t('item.old_price') }}"> --}}
                                @csrf @method('PUT')
                                <button class="input-group-text" title="{{ _t('admin.save') }}"><i class="bi bi-cloud-arrow-up"></i></button>
                            </form>
                        </div>

                        {{-- description --}}
                        <div class="order-1 col-lg-9 d-flex align-items-center" style="height: 38px;">
                            <div class="text-truncate overflow-hidden" title="{{ $item->description }}">{{ $item->description }}</div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="js-no-reload pagination-wrapper">
        {{ $items->links() }}
    </div>
</div>
@endsection
