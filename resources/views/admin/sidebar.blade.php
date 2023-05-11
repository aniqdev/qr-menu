<nav class="list-group js-no-reload" id="sidebar_nav">
	<a href="{{ route('admin.menu') }}" class="list-group-item">
		<i class="bi bi-list-columns"></i>
		{{-- <i class="bi bi-menu-down me-1"></i> --}}
		Menu
	</a>
	<a href="{{ route('categories.index') }}" class="list-group-item">
		<i class="bi bi-menu-button-wide"></i>
		Categories
	</a>
	<a href="{{ route('items.index') }}" class="list-group-item">
		<i class="bi bi-menu-app-fill me-1"></i>
		Dishes
	</a>
	<a href="{{ route('templates') }}" class="list-group-item">
		<i class="bi bi-filetype-html"></i>
		Templates
	</a>
	<a href="{{ route('settings') }}" class="list-group-item">
		<i class="bi bi-sliders"></i>
		Settings
	</a>
	<a href="{{ route('profile') }}" class="list-group-item">
		<i class="bi bi-person-square"></i>
		Profile
	</a>
{{-- 	<a href="{{ route('json-form-test') }}" class="list-group-item">
		json-form-test
	</a> --}}
</nav>
