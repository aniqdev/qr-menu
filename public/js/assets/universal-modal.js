

function modal_load(event, button) {
	event.preventDefault()

	// set modal size - example: data-modalsize="modal-lg"
	button.dataset.modalsize && $('#universalModal .modal-dialog')
		.removeClass('modal-sm').removeClass('modal-lg').removeClass('modal-xl')
		.addClass(button.dataset.modalsize)

	$('#universalModal').modal('show')

	// get modal html - example: data-modalurl="{{ route('items.load-create-modal') }}"
	$.get(button.dataset.modalurl, function(data){
		data.modal_content && $('#universal_modal_content').html(data.modal_content)
		init_image_inputs()
	})
}


function modal_drop() {
	$('#universalModal').modal('hide')
}