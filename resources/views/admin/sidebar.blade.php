<nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_1">
	<a href="{{ route('categories.index') }}" class="list-group-item text-truncate">
		<i class="bi bi-menu-button-wide"></i>
		{{ __('admin_sidebar.categories') }}
	</a>
	<a href="{{ route('items.index') }}" class="list-group-item text-truncate">
		<i class="bi bi-menu-app-fill me-1"></i>
		{{ __('admin_sidebar.dishes') }}
	</a>
	<a href="{{ route('admin.menu') }}" class="list-group-item text-truncate">
		<i class="bi bi-list-columns"></i>
		{{ __('admin_sidebar.templates') }}
	</a>
</nav>
<br>

<nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_2">
	<a href="{{ route('admin.qr-code') }}" class="list-group-item text-truncate">
		<i class="bi bi-qr-code"></i>
		{{ __('admin_sidebar.qr_code') }}
	</a>
	<a href="{{ route('admin.settings') }}" class="list-group-item text-truncate">
		<i class="bi bi-sliders"></i>
		{{ __('admin_sidebar.settings') }}
	</a>
</nav>
<br>

{{-- <nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_3">
	<a href="{{ route('admin.templates') }}" class="list-group-item text-truncate disabled">
		<i class="bi bi-filetype-html"></i>
		{{ __('admin_sidebar.templates') }}
	</a>
	<a href="{{ route('admin.templates') }}" class="list-group-item text-truncate disabled">
		<i class="bi bi-bar-chart-line"></i>
		{{ __('admin_sidebar.statistic') }}
	</a>
</nav> --}}
<br>