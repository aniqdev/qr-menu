
function admin_menu_set_view(view, button){
	$('.set-view').removeClass('btn-primary').addClass('btn-light')
	if(view === 'mobile'){
		$('#menu_iframe').addClass('mobile')
		$(button).removeClass('btn-light').addClass('btn-primary')
	}
	if(view === 'desktop'){
		$('#menu_iframe').removeClass('mobile')
		$(button).removeClass('btn-light').addClass('btn-primary')
	}
}


function init_admin_menu_page() {
	if(!window.jsonForm) window.jsonForm = new JsonForm()
}

function template_settings_submit(valid, settings) {
    if(!valid) return toastr.error('Fill all fields')
    ajax_post('/admin/menu/template-settings-save', {
		_token: $('meta[name="csrf-token"]').attr('content'),
		settings: settings,
		template: jsonForm.choosenTemplate
	}, function (data) {
    	$('#menuSettingsModal').modal('hide')
		data.message && toastr.success(data.message)
		document.getElementById('menu_iframe').contentWindow.location.reload();
    }).fail(ajax_fail_callback)
}

function admin_menu_open_settings(template) {
	window.jsonForm.choosenTemplate = template
	$.get('/admin/menu/template-settings-modal', {
		template: template,
	}, function (data) {
		window.jsonForm.destroy("MyForm")
		window.jsonForm.create("#menuSettingsModalForm", data.form_data,"MyForm");
		window.jsonForm.registerSubmit(template_settings_submit, "MyForm")
		$('#menuSettingsModalLabel').text(data.modal_title)
		$('#menuSettingsModal').modal('show')
	}, 'json')
}
