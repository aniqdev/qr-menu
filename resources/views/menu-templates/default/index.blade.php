@extends('layouts.bootstrap')

@section('content')
<style>
body{
	font-size: {{ tpl_options('font_size') }}px;
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
.category-list{
    list-style: none;
    padding: 0;
}
.item-list{
    list-style: none;
}
.item-description{
    font-style: italic;
    padding-left: 20px;
    color: #999;
    font-size: 0.9em;
}
.shadow-block{
	background: #fff;
	padding: 15px;
	border-radius: 10px;
	box-shadow: 0 0 .5rem rgba(0,0,0,.075);
}
</style>
<div class="container shadow-block_">
	@if(tpl_options('show_logo'))
	<div class="text-center" {{ tpl_options('show_logo') ? 'true' : 'false'}}>
		<img src="{{ $company->image }}" alt="" class="img-thumbnail mb-3"
			style="max-height: 200px;" 
		>
	</div>
	@endif
	<ul class="category-list">
		@foreach($categories as $category)
		<li>
			<div><b>{{ $category->name }}</b></div>
			<ul class="item-list">
				@foreach($category->itemsActive as $item)
				<li class="item-item">
					<div class="d-flex justify-content-between">
						<div class="cols">{{ $item->name }} <span style="font-size: 0.9em;">@if($item->volume)({{ $item->volume }})@endif</span></div>
						<div class="cols flex-grow-1 dotted"></div>
						<div class="cols">{{
							number_format($item->price, 
								tpl_options('price_precision'), 
								tpl_options('decimal_separator'),
								tpl_options('thousands_separator')).
							(tpl_options('space_after_price') ? ' ' : '').
							tpl_options('currency_symbol') 
						}}</div>
					</div>
					@if(tpl_options('show_description'))
					<div class="item-description">{{ $item->description }}</div>
					@endif
				</li>
				@endforeach
			</ul>
		</li>
		@endforeach
	</ul>
</div>
@endsection
