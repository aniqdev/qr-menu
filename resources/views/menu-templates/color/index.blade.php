@extends('layouts.empty')

@section('content')
<style>
.category-list{
	list-style: none;
    padding: 0;
}
.category-item{
	background-size: cover;
	background-position: center;
}
.category-name{
    color: #fff;
    background: #0000005e;
}
.item-list{
	padding: 15px;
    background: #ffffffa6;
}
.item-item{
	background-size: cover;
}
.item-item .dotted{
    position: relative;
    overflow: hidden;
    margin: 0 15px;
}

.item-item .dotted::after{
    content: '';
    position: absolute;
    border-bottom: 1px dashed #999;
    width: 100%;
    top: 50%;
}
</style>
<div class="shadow-block">
	<ul class="category-list">
		@foreach($categories as $category)
		<li class="category-item mb-4" 
			style="background-image: url('{{ $category->image }}');"
			>
			<div class="category-name px-3"><b>{{ $category->name }}</b></div>
			<ul class="item-list" style="background-color: rgb(255 255 255 / {{ tpl_options('card_body_bg_opacity', 65) }}%);">
				@foreach($category->items as $item)
				<li class="d-flex justify-content-between item-item">
					<div class="cols">{{ $item->name }}</div>
					<div class="cols flex-grow-1 dotted"></div>
					<div class="cols">{{
						number_format($item->price, 
							tpl_options('price_precision'), 
							tpl_options('decimal_separator', '.'),
							tpl_options('thousands_separator', ' '))
						 . tpl_options('currency_symbol') 
					}}</div>
				</li>
				@endforeach
			</ul>
		</li>
		@endforeach
	</ul>
</div>
@endsection
