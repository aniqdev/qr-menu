@extends('layouts.back')

@section('content')

<div class="shadow-block">
	<h2>{{ _t('admin_items.add_new') }}</h2>
	@include('admin.items.blocks.create-item-form')
</div>
<script>
// only to show where is the drop-zone:
// $('#item_image_label').on('dragenter', function() {
// 	this.classList.add('dragged-over');
// })
//  .on('dragend drop dragexit dragleave', function() {
// 	this.classList.remove('dragged-over');
// });
</script>
@endsection
