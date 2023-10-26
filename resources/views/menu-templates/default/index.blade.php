@extends('layouts.bootstrap')

@section('title', $title ?? 'Menu')

@section('body-classes', 'theme-' . tpl_options('theme'))

@section('content')
<style>
body{
	font-size: {{ tpl_options('font_size') }}px;
}
.theme-dark{
	background: #222;
    color: #eaeaea;
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
<div class="container">

	@if(tpl_options('show_logo'))
	<div class="text-center" {{ tpl_options('show_logo') ? 'true' : 'false'}}>
		<img src="{{ $company->image }}" alt="" class="img-thumbnail my-3"
			style="max-height: 200px;" 
		>
	</div>
	@endif

	@if(tpl_options('show_company_name'))
	<h1 class="text-center">{{ $company->name }}</h1>
	@endif

	@if(tpl_options('show_company_description'))
	<p class="text-center offset-1 col-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum praesentium quis possimus recusandae eligendi voluptate dolorem explicabo incidunt ea obcaecati officia, facere tempore inventore, fugiat quidem quod aspernatur ut!</p>
	@endif

	<ul class="category-list">
		@foreach($categories as $category)
			@if(!$category->itemsActive->count())
				@continue
			@endif
		<li>
			<div><b>{{ $category->name }}</b></div>
			<ul class="item-list">
				@foreach($category->itemsActive as $item)
				<li class="item-item">
					<div class="d-flex justify-content-between">
						<div class="">{{ $item->name }} <span style="font-size: 0.9em;">@if($item->volume)({{ $item->volume }})@endif</span></div>
						<div class="flex-grow-1 dotted"></div>
						<div class="text-nowrap">{{
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
