

$('body').on('click', '.js-no-reload a, .js-no-reload-link', function(e) {
	if (e.ctrlKey) return true // if pressed Control
	e.preventDefault();
	go_to_page(this.href)
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

		// fix conflict with offCanvas
		document.body.style.overflow = 'auto'

		init_app()
	}).fail(ajax_fail_callback)
}

function init_app() {
	init_sidebar_highlighting()
	init_top_menu_highlighting()
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
	// log('11',object)
	// log('22',data)
	// log('33',object.responseJSON)
	if (object.responseJSON && object.responseJSON.errors) {
		var errors = object.responseJSON.errors
		for (var error_name in errors) {
			$(`input[name="${error_name}"]`).addClass('is-invalid')
		}
		for (var error_name in errors) {
			toastr.error(errors[error_name].join(',\r\n'), error_name)
		}
	}else if(object.responseJSON && object.responseJSON.message){
		object.responseJSON.message === 'Unauthenticated.' && (location.href = '/login')
		toastr.error(object.responseJSON.message)
	}
}


$(document).on('input', '.is-invalid', function(){
	$(this).removeClass('is-invalid')
})


function init_tooltips() {
	$('[data-bs-toggle="tooltip"]').each(function() {
		$(this).data('bsTitle') && $(this).tooltip()
	})
}


function init_sidebar_highlighting() {
	$(`.js-sidebar-nav a`).removeClass('active')
	$(`.js-sidebar-nav a[href="${location.origin+location.pathname}"]`).addClass('active')
}

function init_top_menu_highlighting() {
	$(`.js-top-nav a`).removeClass('active')
	$(`.js-top-nav a[href="${location.origin+location.pathname}"]`).addClass('active')
}



