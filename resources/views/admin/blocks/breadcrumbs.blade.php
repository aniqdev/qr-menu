<nav aria-label="breadcrumb">
	<ol class="breadcrumb js-no-reload">
		<li class="breadcrumb-item" title="{{ _t('breadcrumbs.home_title') }}">
			<a href="{{ route('dashboard') }}">{{ _t('breadcrumbs.home_label') }}</a>
		</li>
		@foreach($breadcrumbs as $breadcrumb)
			@if($loop->last)
			<li class="breadcrumb-item active" title="{{ $breadcrumb['title'] }}">
				{{ $breadcrumb['label'] }}
			</li>
			@else
			<li class="breadcrumb-item {{ !$loop->last ?: 'active' }}" title="{{ $breadcrumb['title'] }}">
				<a href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['label'] }}</a>
			</li>
			@endif
		@endforeach
	</ol>
</nav>