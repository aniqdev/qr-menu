log('file: mark-forms.js')

function init_mark_form() {
	$(".marked-form").on("input", function() {
		this.classList.remove('saved')
	})
	$(".marked-form").on("change", function() {
		this.classList.remove('saved')
	})
}