@extends('layouts.back')

@section('content')
<div class="shadow-block" id="admin_dashboard">
    <h2>{{ _t('admin_dashboard.dashboard') }}</h2>
    {{-- <div class="row"> --}}
        <h5 class="">Links</h5>
        {{-- <div class="col-sm-6 mb-3"> --}}
            <a class="btn btn-primary" href="{{ route('categories.index') }}">{{ _t('admin_nav.categories') }}</a>
        {{-- </div> --}}
        {{-- <div class="col-sm-6 mb-3"> --}}
            <a class="btn btn-primary" href="{{ route('items.index') }}">{{ _t('admin_nav.dishes') }}</a>
        {{-- </div> --}}
    {{-- </div> --}}
    {{-- <hr> --}}
    {{-- <iframe src="{{ route('dashboard-iframe-statistic') }}" frameborder="0" onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+30+"px";}(this));' style="height:200px;width:100%;border:none;overflow:hidden;"></iframe> --}}
    @if(auth()->user()->isSuperAdmin() && false)
    <form class="laravel-process" onsubmit="submit_form(this, event)" action="{{ route('run-command') }}">
        @csrf
        <input class="form-control mb-3 command-input" type="text" name="command" placeholder="command" autofocus>
        <textarea class="form-control output-textarea" readonly name="output" cols="30" rows="10" placeholder="output"></textarea>
    </form>
    @endif
    @if(auth()->user()->isSuperAdmin())
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h4>Companies</h4>
            <ul class="list-group">
                @foreach($companies as $company)
                <li class="list-group-item {{ $company->isAuthUserAdmin('active') }}">
                    <div class="fw-bold d-flex justify-content-between align-items-center">
                        <span>[{{ $company->id }}] {{ $company->name }}</span>
                        @if(!$company->isAuthUserAdmin())
                        <a href="?become-admin-of-company={{ $company->id }}" class="badge bg-danger rounded-pill ms-2">become admin</a>
                        @endif
                        <span class="badge bg-primary rounded-pill ms-auto">{{ $company->items()->count() }}</span>
                    </div>
                    <div>
                        @foreach($company->admins as $user)
                            @if($user->isMe()) @continue @endif
                            <div class="company-admin"
                                 title="user id: {{ $user->id }} &#013;created_at: {{ $user->created_at }} &#013;updated_at: {{ $user->updated_at }}">
                                <span class="fw-bold" >{{ $user->name }}</span>
                                <span>{{ $user->email }}</span>
                                <span> - <b><small>{{ $user->last_seen?->format('Y-m-d H:i') }}</small></b></span>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ $company->cafeLink() }}" target="_blank" class="d-block text-truncate {{ $company->isAuthUserAdmin('link-light') }}">{{ $company->cafeLink() }}</a>
                </li>
                @endforeach
            </ul>
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
