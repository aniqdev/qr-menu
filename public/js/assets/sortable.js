// log('file: sortable.js')

function init_sortable() {
	$( ".sortable" ).sortable({
	  placeholder: "ui-placeholder py-2",
	  update: on_sortable_update,
	  handle: ".sortable-handle",
	  items: " .sortable-item",
	});
}

function on_sortable_update() {
	var ids = []
	this.querySelectorAll('.sortable-item').forEach(function (item) {
		ids.push(item.dataset.id)
	})
	$.post(this.dataset.route,{
		// _token: $('meta[name="csrf-token"]').attr('content'),
		ids: ids,
	}, function (data) {
		data.message && toastr.success(data.message)
	}, 'json').fail(ajax_fail_callback)
}