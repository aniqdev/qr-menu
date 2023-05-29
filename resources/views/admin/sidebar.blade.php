<h5>Menu</h5>
<nav class="list-group js-no-reload" id="sidebar_nav">
	<a href="{{ route('admin.menu') }}" class="list-group-item">
		<i class="bi bi-list-columns"></i>
		{{ __('admin_sidebar.menu') }}
	</a>
	<a href="{{ route('categories.index') }}" class="list-group-item">
		<i class="bi bi-menu-button-wide"></i>
		{{ __('admin_sidebar.categories') }}
	</a>
	<a href="{{ route('items.index') }}" class="list-group-item">
		<i class="bi bi-menu-app-fill me-1"></i>
		{{ __('admin_sidebar.dishes') }}
	</a>
</nav>
<br>
<h5>Restaurant</h5>
<nav class="list-group js-no-reload" id="sidebar_nav">
	<a href="{{ route('templates') }}" class="list-group-item">
		<i class="bi bi-filetype-html"></i>
		{{ __('admin_sidebar.templates') }}
	</a>
	<a href="{{ route('settings') }}" class="list-group-item">
		<i class="bi bi-sliders"></i>
		{{ __('admin_sidebar.settings') }}
	</a>
	<a href="{{ route('profile') }}" class="list-group-item">
		<i class="bi bi-person-square"></i>
		{{ __('admin_sidebar.profile') }}
	</a>
</nav>