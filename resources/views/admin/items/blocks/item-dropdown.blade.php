<ul class="nav ms-auto" style="margin: -10px;">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle pe-1" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
        <i class="bi bi-list"></i>
    </a>
    <ul class="dropdown-menu">
      <li>
          <a href="{{ route('items.edit', $item) }}" class="btn text-info" title="{{ _t('admin.edit') }}">
            <i class="bi bi-pencil"></i> Edit
        </a>
      </li>
      <li>
          <form action="{{ route('items.destroy', $item) }}" class="d-inline" 
                onsubmit="if(!confirm('Delete item?')) return false; submit_form(this, event) ">
                @method('delete') @csrf
            <button type="submit" class="btn text-danger" title="{{ _t('admin.delete') }}">
                <i class="bi bi-x-lg"></i> Delete
            </button>
        </form>
      </li>
    </ul>
  </li>
</ul>