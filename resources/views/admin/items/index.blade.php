@extends('layouts.back')

@section('content')
<style>
.item-item{
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, 0.125);
}
</style>
<div class="shadow-block">
    <h2 class="d-flex">
        {{ __('admin_categories.categories') }}
        <a href="{{ route('items.create') }}" class="ms-auto btn btn-outline-primary">
            {{ __('Create') }} <i class="bi bi-plus-square"></i>
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
                <div class="col-4 col-sm-3 col-md-2 js-no-reload">
                    <a href="{{ route('items.edit', $item) }}" class="d-block">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" 
                        class="d-block m-auto" style="max-width:100%; max-height:100px;">
                    </a>
                </div>
                <div class="col-8 col-sm-9 col-md-10">

                    <div class="row">

                        {{-- name --}}
                        <div class=" d-flex align-items-center item-name mb-lg-2">
                            <a href="{{ route('items.edit', $item) }}" class="text-truncate  js-no-reload-link">{{ $item->name }}</a>
                            @include('admin.items.blocks.item-dropdown')
                        </div>

                        {{-- prices --}}
                        <div class="order-2 col-lg-4">
                            <form class="input-group" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
                                <input class="form-control pe-0" type="number" name="price" value="{{ $item->price }}" title="{{ __('item.price') }}">
                                <input class="form-control pe-0" type="number" name="old_price" value="{{ $item->old_price }}" title="{{ __('item.old_price') }}">
                                @csrf @method('PUT')
                                <button class="input-group-text" title="{{ __('admin.save') }}"><i class="bi bi-cloud-arrow-up"></i></button>
                            </form>
                        </div>

                        {{-- description --}}
                        <div class="order-1 col-lg-8 d-flex align-items-center" style="height: 38px;">
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
