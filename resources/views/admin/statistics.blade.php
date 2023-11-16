@extends('layouts.back')

@section('content')
<style>
.periods{
	display: flex;
	overflow: auto;
	gap: 10px;
}
.periods .period{
	padding: 10px 24px;
	font-size: 14px;
	line-height: 149%;
	background-color: #fff;
	border-radius: 8px;
	text-decoration: none;
	color: #2c2c2f;
	transition: background .2s ease;
	display: inline-block;
	border: 1px solid rgba(0,0,0,.07);
	margin-top: 10px;
	margin-bottom: 10px;
	text-wrap: nowrap;
}
.periods .period.active,
.periods .period:hover{
	background-color: rgba(90,136,175,.1);
	color: #5a88af;
}
.numbers{
	display: flex;
	overflow: auto;
	gap: 15px;
}
.number-item{
	width: 100%;
	padding: 10px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	border: 1px solid #fff;
	border-radius: 10px;
	background-color: #fff;
	transition: all .2s ease;
	cursor: default;
	min-width: 100px;
	border-color: rgba(0,0,0,.07);
}
.number-item.active{
	border-color: #5a88af;
}
.number-item-title{
	margin-bottom: 4px;
	font-weight: 500;
	font-size: 18px;
	line-height: 149%;
	text-align: center;
	color: #92949b;
}
.number-item-number{
	font-weight: 500;
	font-size: 24px;
	line-height: 149%;
	color: #2c2c2f;
}

</style>
<div class="shadow-block" id="admin_dashboard">
	<h2>{{ _t('admin_statistics.statistics') }}</h2>
	<hr>

	<div class="periods mt-3 js-no-reload_">
		<a href="?period=today" class="period {{ request('period', 'today') !== 'today' ?: 'active' }}">{{ _t('admin_statistics.today') }}</a>
		<a href="?period=yesterday" class="period {{ request('period') !== 'yesterday' ?: 'active' }}">{{ _t('admin_statistics.yesterday') }}</a>
		<a href="?period=7_days" class="period {{ request('period') !== '7_days' ?: 'active' }}">{{ _t('admin_statistics.7_days') }}</a>
		<a href="?period=30_days" class="period {{ request('period') !== '30_days' ?: 'active' }}">{{ _t('admin_statistics.30_days') }}</a>
	</div>

	<div class="numbers mt-3">
		<div class="number-item active">
			<span class="number-item-title">{{ _t('admin_statistics.online') }}</span>
			<span class="number-item-number">{{ $online }}</span>
		</div>
		<div class="number-item">
			<span class="number-item-title">{{ _t('admin_statistics.visits') }}</span>
			<span class="number-item-number">{{ $visits }}</span>
		</div>
		<div class="number-item">
			<span class="number-item-title">{{ _t('admin_statistics.reviews') }}</span>
			<span class="number-item-number">{{ $reviews }}</span>
		</div>
	</div>

	<h5 class="mt-4 text-center">{{ _t('admin_statistics.by_hours') }}</h5>
	<div class="chart mt-3">
		<canvas id="chart_canvas" height="300"></canvas>
	</div>

	<h5 class="mt-4 text-center">{{ _t('admin_statistics.last_visits') }}</h5>
	<div class="table-wrap">
		<table>
			<thead>
				<tr>
					<th>Time</th>
					<th>Times</th>
					<th>City</th>
					<th>User agent</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lastVisits as $visit)
				<tr>
					<td data-label="Time">{{ $visit->updated_at->format('d-m H:i') }}</td>
					<td data-label="Times">{{ $visit->visits_count }}</td>
					<td data-label="City">{{ $visit->city ?? '-' }}</td>
					<td data-label="User agent">
						<div class="text-truncate d-inline-block">{{ $visit->user_agent }}</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="/js/chart.js"></script>
<script>
  const ctx = document.getElementById('chart_canvas');

  new Chart(ctx, {
	type: 'bar',
	data: {
	  labels: JSON.parse(`{!! json_encode($chartData->labels) !!}`),
	  datasets: [{
		label: 'Visits',
		data: JSON.parse(`{!! json_encode($chartData->data) !!}`),
		borderWidth: 1
	  }]
	},
	options: {
		maintainAspectRatio: false,
	    scales: {
		    y: {
		        beginAtZero: true
		    }
	    }
	}
  });
</script>
@endsection
