

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
	init_image_inputs()
	init_admin_menu_page()
}

$(function () {	init_app() })

window.addEventListener("popstate", (event) => {
  event.state && event.state.url && go_to_page(event.state.url, false)
  !event.state && (location.href = location.href)
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
		object.responseJSON.message === 'Unauthenticated.' && (location.href = '/login')
		toastr.error(object.responseJSON.message)
	}
}





function init_tooltips() {
	$('[data-bs-toggle="tooltip"]').each(function() {
		$(this).data('bsTitle') && $(this).tooltip()
	})
}

function init_sidebar_highlighting() {
	$(`#sidebar_nav a`).removeClass('active')
	$(`#sidebar_nav a[href="${location.origin+location.pathname}"]`).addClass('active')
}



