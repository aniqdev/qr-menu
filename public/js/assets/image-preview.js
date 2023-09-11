// log('file: image-preview.js')

// based on createObjectURL
function init_image_inputs__old() {
	$('.image-input').each(function() {
		$(this).closest('.image-input-wrapper').find('img').on('load', function() {
			window.URL.revokeObjectURL(this.src);
		})
		$(this).on('change', function() {
			log('input changed')
			if (this.files.length) {
				var file = this.files[0]
				if (!['image/jpeg', 'image/png'].includes(file.type)) {
					this.value = null
					return toastr.error('Wrong file type. Use jpeg or png')
				}
				var imgTag = $(this).closest('.image-input-wrapper').find('img')
				imgTag.attr('src', window.URL.createObjectURL(file))
			}
		})
	})
}


// based on FileReader
function init_image_inputs() {
	document.querySelectorAll('.image-input').forEach(function(input) {
		input.onchange = function() {
			if (input.files.length) {
			    var reader = new FileReader();
			    reader.onload = (e) => {
			    	input.closest('.image-input-wrapper').querySelector('img').src = reader.result
			    };
			    reader.readAsDataURL(input.files[0]);
			}
		}
	})
}


function remove_image(button) {
	$(button).closest('.image-input-wrapper').find('.image-input').val(null)
	$(button).closest('.image-input-wrapper').find('input[name=remove_image]').val(1)
	$(button).closest('.image-input-wrapper').find('.js-img-preview').attr('src', button.dataset.imgplaceholder)
	$(button).closest('.marked-form').removeClass('saved')
}