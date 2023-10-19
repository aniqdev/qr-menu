<div class="modal-header">
	<h1 class="modal-title fs-5" id="universalModalLabel">{{ _t('admin_menu.menu') }}</h1>
	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body pb-3">
	<iframe src="{{ route('restaurant.menu', $companySlug) }}?template={{ request('template', $choosenTemplate) }}" frameborder="0" id="menu_iframe" style="height:650px;width:100%;"></iframe>
</div>
{{-- <div class="modal-footer"> --}}
	{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="universalModal">Close</button> --}}
	{{-- <button type="button" class="btn btn-primary" onclick="$('#create_item_form').submit()">Save changes</button> --}}
{{-- </div> --}}