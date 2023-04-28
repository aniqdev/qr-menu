log('file: image-preview.js')

function init_image_inputs() {
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
}