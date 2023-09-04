@extends('layouts.empty')

@section('content')
<style>
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
.category-list{
    list-style: none;
    padding: 0;
}
.item-list{
	
}
.shadow-block{
	background: #fff;
	padding: 15px;
	border-radius: 10px;
	box-shadow: 0 0 .5rem rgba(0,0,0,.075);
}
</style>
<div class="shadow-block">
	<div class="text-center">
		<img src="{{ $company->image }}" alt="" class="img-thumbnail mb-3"
			style="max-height: 200px;" 
		>
	</div>
	<ul class="category-list">
		@foreach($categories as $category)
		<li>
			<div><b>{{ $category->name }}</b></div>
			<ul class="item-list">
				@foreach($category->itemsActive as $item)
				<li class="d-flex justify-content-between item-item">
					<div class="cols">{{ $item->name }}</div>
					<div class="cols flex-grow-1 dotted"></div>
					<div class="cols">{{
						number_format($item->price, 
							tpl_options('price_precision'), 
							tpl_options('decimal_separator'),
							tpl_options('thousands_separator')).
						(tpl_options('space_after_price') ? ' ' : '').
						tpl_options('currency_symbol') 
					}}</div>
				</li>
				@endforeach
			</ul>
		</li>
		@endforeach
	</ul>
</div>
@endsection
