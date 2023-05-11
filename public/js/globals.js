// log('globals.js')

function send_ajax(method, url, data, callback, options = {}) {
	var defaults = {
		url: url,
		type: method,
		data: data,
		dataType: 'json',
		contentType: false,
		processData: false,
		success: callback,
	}
	return $.ajax(Object.assign(defaults, options))
}

function ajax_post(url, data, callback) {
	data = JSON.stringify(data)
	return send_ajax('post', url, data, callback, {contentType: "application/json; charset=utf-8"})
}

function ajax_post_data(url, data, callback) {
	return send_ajax('post', url, data, callback)
}
