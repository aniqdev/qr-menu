<ul class="nav ms-auto" style="margin: -10px;">
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle pe-1" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
				<i class="bi bi-list"></i>
		</a>
		<ul class="dropdown-menu">
			<li>
				<form action="{{ route('items.update-visibility', $item) }}" class="d-inline" onsubmit="submit_form(this, event)">
					@csrf
					<button type="submit" class="btn text-success" title="">
						<i class="bi bi-eye-fill"></i>
						@if($item->is_active)
							<span id="item_{{ $item->id }}_visibility_btn">Hide</span>
						@else
							<span id="item_{{ $item->id }}_visibility_btn">Show</span>
						@endif
					</button>
				</form>
			</li>
			<li>
				<a href="{{ route('items.edit', $item) }}" class="btn text-info" title="{{ _t('admin.edit') }}">
						<i class="bi bi-pencil"></i>
						<span>{{ _t('admin_categories.edit') }}</span>
				</a>
			</li>
			<li>
					<form action="{{ route('items.destroy', $item) }}" class="d-inline" 
								onsubmit="if(!confirm('Delete item?')) return false; submit_form(this, event) ">
								@method('delete') @csrf
						<button type="submit" class="btn text-danger" title="{{ _t('admin.delete') }}">
								<i class="bi bi-x-lg"></i>
								<span>{{ _t('admin_categories.delete') }}</span>
						</button>
				</form>
			</li>
		</ul>
	</li>
</ul>