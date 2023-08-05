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
</style>
<label for="item_image" class="position-relative" id="item_image_label">
	<img class="img-thumbnail" src="{{ $model->image ?? '/images/img-placeholder.png' }}" alt="">
	<input type="file" name="image" class="image-input" id="item_image" accept=".jpg, .jpeg, .png, .webp">
</label>