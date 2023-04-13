@extends('layouts.backoffice')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
            {{ $categories->links() }}
            <table class="table table-striped">
                @foreach($categories as $category)
                    <tr>
                        <td><img src="{{ $category->image }}" alt="" style="max-width:50px; max-height:50px;"></td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div>{{ $category->description }}</div>
                            <table class="table table-success table-striped">
                                @foreach($category->dishes as $dish)
                                    <tr>
                                        <td>
                                            <img src="{{ $dish->image }}" alt="" style="max-width:50px; max-height:50px;">
                                        </td>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ mb_substr($dish->description, 0, 40) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
