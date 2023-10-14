@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <h2>{{ _t('admin_categories.create') }}</h2>
    <form class="row marked-form saved" onsubmit="submit_form(this, event)" action="{{ route('categories.store') }}">
        @csrf
        <div class="col-md-4">
            @include('admin.blocks.image-input')
            <hr>
            <button type="submit" class="btn btn-primary">{{ _t('admin.create') }}</button>
        </div>
        <div class="col-md-8">
              <label for="item_title" class="form-label">{{ _t('admin_categories.name') }}</label>
              <input type="text" name="name" class="form-control" id="item_title" placeholder="Vine">

              <label for="description" class="form-label">{{ _t('admin_categories.description') }}</label>
              <textarea name="description" class="form-control" id="description" rows="3" placeholder="Vines grow in one of four ways: hooked, clinging, twining or tendril."></textarea>
        </div>
    </form>
</div>
@endsection
