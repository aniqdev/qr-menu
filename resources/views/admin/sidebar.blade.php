<nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_1">
	<a href="{{ route('categories.index') }}" class="list-group-item text-truncate">
		<i class="bi bi-menu-button-wide me-1"></i>
		{{ _t('admin_nav.categories') }}
	</a>
	<a href="{{ route('items.index') }}" class="list-group-item text-truncate">
		<i class="bi bi-menu-app-fill me-1"></i>
		{{ _t('admin_nav.dishes') }}
	</a>
	<a href="{{ route('admin.menu') }}" class="list-group-item text-truncate">
		<i class="bi bi-list-columns me-1"></i>
		{{ _t('admin_nav.templates') }}
	</a>
</nav>
<br>

<nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_2">
	<a href="{{ route('admin.qr-code') }}" class="list-group-item text-truncate">
		<i class="bi bi-qr-code me-1"></i>
		{{ _t('admin_nav.qr_code') }}
	</a>
	<a href="{{ route('admin.settings') }}" class="list-group-item text-truncate">
		<i class="bi bi-sliders me-1"></i>
		{{ _t('admin_nav.settings') }}
	</a>
</nav>
<br>

{{-- <nav class="list-group js-no-reload js-sidebar-nav" id="sidebar_nav_3">
	<a href="{{ route('admin.templates') }}" class="list-group-item text-truncate disabled">
		<i class="bi bi-filetype-html me-1"></i>
		{{ _t('admin_nav.templates') }}
	</a>
	<a href="{{ route('admin.templates') }}" class="list-group-item text-truncate disabled">
		<i class="bi bi-bar-chart-line me-1"></i>
		{{ _t('admin_nav.statistic') }}
	</a>
</nav> --}}
<br>