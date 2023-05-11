@extends('layouts.back')

@section('content')
<div class="shadow-block">
	<?php dump($user->toArray()) ?>
</div>
@endsection
