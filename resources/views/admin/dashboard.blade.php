@extends('layouts.back')

@section('content')
<div class="shadow-block" id="admin_dashboard">
    <h2>{{ _t('admin_dashboard.dashboard') }}</h2>
    <hr>
    <iframe src="{{ route('dashboard-iframe-statistic') }}" frameborder="0" onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+30+"px";}(this));' style="height:200px;width:100%;border:none;overflow:hidden;"></iframe>
    @if(auth()->user()->isSuperAdmin() && false)
    <form class="laravel-process" onsubmit="submit_form(this, event)" action="{{ route('run-command') }}">
        @csrf
        <input class="form-control mb-3 command-input" type="text" name="command" placeholder="command" autofocus>
        <textarea class="form-control output-textarea" readonly name="output" cols="30" rows="10" placeholder="output"></textarea>
    </form><hr>
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
                    <span class="badge bg-primary rounded-pill">...</span>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
    @endif
</div>
@endsection
