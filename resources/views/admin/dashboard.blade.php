@extends('layouts.back')

@section('content')
<div class="shadow-block">
    <h2>Dashboard</h2>
    <hr>
    @if(auth()->user()->isSuperAdmin())
    <div class="row">
        <div class="col-md-6">
            <h4>Companies</h4>
            <ol class="list-group list-group-numbered">
                @foreach($companies as $company)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $company->name }}</div>
                        <a href="{{ $company->cafeLink() }}" target="_blank">{{ $company->cafeLink() }}</a>
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $company->items()->count() }}</span>
                </li>
                @endforeach
            </ol>
        </div>
        <div class="col-md-6">
            <h4>Users</h4>
            <ol class="list-group list-group-numbered">
                @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $user->name }}</div> {{ $user->email }}
                    </div>
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
    @endif
</div>
@endsection
