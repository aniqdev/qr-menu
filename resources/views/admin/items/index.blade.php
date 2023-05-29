@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <div class="row js-no-reload">
        <div class="col-sm-8 pagination-wrapper">
            {{ $items->links() }}
        </div>
        <div class="col-sm-4 text-end">
            <a href="{{ route('items.create') }}" class="btn btn-outline-primary">Create <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <hr>
    <table class="table table-striped">
        @foreach($items as $item)
            <tr>
                <td class="js-no-reload">
                    <a href="{{ route('items.edit', $item) }}">
                        <img src="{{ $item->image }}" alt="" style="max-width:50px; max-height:50px;">
                    </a>
                </td>
                <td class="js-no-reload">
                    <a href="{{ route('items.edit', $item) }}">{{ $item->name }}</a>
                </td>
                <td>
                    <div>{{ $item->description }}</div>
                </td>
                <td>
                    <form class="input-group" onsubmit="submit_form(this, event)" action="{{ route('items.update', $item) }}">
                        <input class="form-control pe-0" type="number" name="price" value="{{ $item->price }}" title="{{ __('item.price') }}">
                        <input class="form-control pe-0" type="number" name="old_price" value="{{ $item->old_price }}" title="{{ __('item.old_price') }}">
                        @csrf @method('PUT')
                        <button class="input-group-text" title="{{ __('admin.save') }}"><i class="bi bi-cloud-arrow-up"></i></button>
                    </form>
                </td>
                <td class="text-end" style="min-width: 107px;">
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-outline-info" title="{{ __('admin.edit') }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('items.destroy', $item) }}" class="d-inline" 
                            onsubmit="if(!confirm('Delete item?')) return false; submit_form(this, event) ">
                            @method('delete') @csrf
                        <button type="submit" class="btn btn-outline-danger" title="{{ __('admin.delete') }}">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="js-no-reload pagination-wrapper">
        {{ $items->links() }}
    </div>
</div>
@endsection
