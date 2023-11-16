@extends('layouts.back')

@section('content')
<div class="shadow-block" id="admin_dashboard">
	@include('admin.blocks.breadcrumbs', [
		'breadcrumbs' => [
			['id' => 'breadcrumb_feedback', 'href' => '#', 'label' => _t('admin_nav.feedback'), 'title' => _t('admin_nav.feedback')],
		]
	])
	<h2>{{ _t('admin_nav.feedback') }}</h2>
	<div class="table-wrap">
		<table>
			<thead>
				<tr>
					<th>Time</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Message</th>
				</tr>
			</thead>
			<tbody>
				@foreach($feedbacks as $feedback)
				<tr>
					<td data-label="Time">{{ $feedback->created_at->format('d-m H:i') }}</td>
					<td data-label="Email">{{ $feedback->email ?? '-' }}</td>
					<td data-label="Phone">{{ $feedback->phone ?? '-' }}</td>
					<td data-label="Message">
						<div class="text-start px-2 d-inline-block">{{ $feedback->message }}</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection