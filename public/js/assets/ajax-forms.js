// log('file: ajax-forms.js')

function submit_form(form, event) {
	event.preventDefault();

	var formData = new FormData(form)

	ajax_post_data(form.action, formData, function(data){
		data.message && toastr.success(data.message)
		data.redirect && go_to_page(data.redirect)
		form.classList.add('saved')
	}).fail(ajax_fail_callback)

	// $.ajax({
	// 	url: form.action,
	// 	type: 'POST',
	// 	data: formData,
	// 	dataType: 'json',
	// 	contentType: false,
	// 	processData: false,
	// 	success: function(data){
	// 		data.message && toastr.success(data.message)
	// 		data.redirect && go_to_page(data.redirect)
	// 		form.classList.add('saved')
	// 	},
	// }).fail(ajax_fail_callback)
}