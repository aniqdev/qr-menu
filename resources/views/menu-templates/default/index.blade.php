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
</style>
<div class="shadow-block">
	<ul>
		@foreach($categories as $category)
		<li>
			<div><b>{{ $category->name }}</b></div>
			<ul>
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
