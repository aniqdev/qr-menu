<style>
#item_image_label.dragged-over{
	outline: 1px solid mediumaquamarine;
		box-shadow: 0 0 10px mediumaquamarine;
}
#item_image_label .image-input{
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
	width: 100%;
	height: 100%;
	display: block;
}
.item-image-remove-button{
	position: absolute;
	right: 0;
	background: #ffffffa3;
    outline: 3px solid #ffffffa3;
    z-index: 2;
}
</style>
<label for="item_image" class="position-relative image-input-wrapper mb-3" id="item_image_label">

	<button type="button" class="btn btn-outline-danger item-image-remove-button"
		data-imgplaceholder="{{ get_img_placeholder_src() }}"
		onclick="window.remove_image(this)" 
	><i class="bi bi-trash"></i></button>

	<img class="img-thumbnail js-img-preview" src="{{ $model->image_medium ?? get_img_placeholder_src() }}" alt="">
	<input type="file" name="image" class="image-input" id="item_image" accept=".jpg, .jpeg, .png, .webp">
	<input type="hidden" name="remove_image">
</label>