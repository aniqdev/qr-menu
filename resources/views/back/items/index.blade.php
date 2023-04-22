@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <div class="row js-no-reload">
        <div class="col-sm-8">
            {{ $items->links() }}
        </div>
        <div class="col-sm-4 text-end">
            <a href="{{ route('items.create') }}" class="btn btn-outline-primary">Create <i class="bi bi-plus-square"></i></a>
        </div>
    </div>
    <table class="table table-striped">
        @foreach($items as $item)
            <tr>
                <td><img src="{{ $item->image }}" alt="" style="max-width:50px; max-height:50px;"></td>
                <td>{{ $item->name }}</td>
                <td>
                    <div>{{ $item->description }}</div>
                </td>
                <td>{{ $item->price }}</td>
                <td class="text-end">
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-outline-info">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="js-no-reload">
        {{ $items->links() }}
    </div>
</div>
@endsection
