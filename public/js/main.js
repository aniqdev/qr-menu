

$('body').on('click', '.js-no-reload a', function(e) {
	e.preventDefault();
	var url = this.href
	go_to_page(url)
})

function go_to_page(url, pushState = true) {
	$.get(url, function(data) {
		var htmlDoc = document.implementation.createHTMLDocument('data');
		htmlDoc.open();
		htmlDoc.write(data)
		htmlDoc.close();

		var yield_content_current = document.getElementById('app_root')
		var yield_content_loaded_html = htmlDoc.getElementById('app_root')
		if (!yield_content_loaded_html) {
			return toastr.error('Render error')
		}
		yield_content_loaded_html = yield_content_loaded_html.innerHTML

		document.title = htmlDoc.title;

		pushState && window.history.pushState({url: url},"", url);

		yield_content_current.innerHTML = yield_content_loaded_html

		init_app()
	}).fail(ajax_fail_callback)
}

function init_app() {
	init_sidebar_highlighting()
	init_tooltips()
	init_sortable()
	init_mark_form()
}

$(function () {	init_app() })

window.addEventListener("popstate", (event) => {
  event.state.url && go_to_page(event.state.url, false)
});

function ajax_fail_callback(object, data) {
	log(object)
	log(data)
	log(object.responseJSON)
	if (object.responseJSON && object.responseJSON.errors) {
		var errors = object.responseJSON.errors
		for (var error_name in errors) {
			toastr.error(errors[error_name].join(',\r\n'), error_name)
		}
	}else if(object.responseJSON && object.responseJSON.message){
		toastr.error(object.responseJSON.message)
	}
}

function init_mark_form() {
	$(".marked-form").on("input", function() {
		this.classList.remove('saved')
	})
	$(".marked-form").on("change", function() {
		this.classList.remove('saved')
	})
}

function init_sortable() {
	$( ".sortable" ).sortable({
	  placeholder: "list-group-item ui-placeholder",
	  update: on_sortable_update,
	  handle: ".sortable-handle",
	  items: " .sortable-item",
	});
}

function on_sortable_update() {
	var ids = []
	this.querySelectorAll('li').forEach(function (li) {
		ids.push(li.dataset.id)
	})
	log(ids)
	$.post('/items/update-sorting',{
		_token: $('meta[name="csrf-token"]').attr('content'),
		ids: ids,
	}, function (data) {
		data.message && toastr.success(data.message)
	}, 'json').fail(ajax_fail_callback)
}

function init_tooltips() {
	$('[data-bs-toggle="tooltip"]').tooltip();
}

function init_sidebar_highlighting() {
	$(`#sidebar_nav a`).removeClass('active')
	$(`#sidebar_nav a[href="${location.origin+location.pathname}"]`).addClass('active')
}

$('.image-input').each(function() {
	$(this).closest('label').find('img').on('load', function() {
		window.URL.revokeObjectURL(this.src);
	})
	$(this).on('change', function() {
		if (this.files.length) {
			var file = this.files[0]
			if (!['image/jpeg', 'image/png'].includes(file.type)) {
				this.value = null
				return toastr.error('Wrong file type. Use jpeg or png')
			}
			var imgTag = $(this).closest('label').find('img')
			imgTag.attr('src', window.URL.createObjectURL(file))
		}
	})
})

function submit_form(form, event) {
	event.preventDefault();

	var formData = new FormData(form)

	$.ajax({
		url: form.action,
		type: 'POST',
		data: formData,
		dataType: 'json',
		contentType: false,
		processData: false,
		success: function(data){
			data.message && toastr.success(data.message)
			data.redirect && go_to_page(data.redirect)
			form.classList.add('saved')
		},
		fail: ajax_fail_callback
	})
}