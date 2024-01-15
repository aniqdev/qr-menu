@extends('layouts.back')

@section('content')
<style>
.btns .btn{
    margin-bottom: 20px;
    display: block;
}
</style>
<div class="shadow-block" id="admin_dashboard">
    <h2>{{ _t('admin_dashboard.test') }}</h2>

    <hr>
    <div class="row">
        <div class="col-lg-2">
            
        </div>
        <div class="col-lg-12">
            <div class="mb-5_">
                {{ dump($_SERVER['REQUEST_URI']) }}
            </div>
        </div>
        <div class="col-lg-4 py-5 btns">
            <button type="button" class="btn btn-primary" onclick="go_to_page('?test=1')">button->go_to_page('?test=1')</button>
            <button type="button" class="btn btn-secondary" onclick="go_to_page('?test=2')">button->go_to_page('?test=2')</button>
            <a class="btn btn-success js-no-reload-link" href="?test=3">no-reload-link "?test=3"</a>
            <a class="btn btn-danger js-no-reload-link" href="#test-hashtag-1">no-reload-link "#hashtag-1"</a>
            <a class="btn btn-warning" href="#hashtag-2">simple-link "#hashtag-2"</a>
            <a class="btn btn-info" href="?simple=link">"?simple=link"</a>
            <a class="btn btn-light">Light</a>
            <a class="btn btn-dark">Dark</a>

            <button type="button" class="btn btn-link">Link</button>
        </div>
        <div class="col-lg-2">
            
        </div>
    </div>

</div>
@endsection
