@extends('layouts.bootstrap')

@section('title', $title ?? 'Menu')

@section('body-classes', 'theme-' . tpl_options('theme'))

@section('content')
<style>
*,*:after,*:before {
	box-sizing: border-box;
	background: none;
	color: inherit;
	font: inherit;
	padding: 0;
	margin: 0;
	outline: none;
	border: none;
	text-decoration: none;
	box-shadow: none;
	vertical-align: inherit;
	min-height: 0;
	min-width: 0;
	-webkit-font-smoothing: antialiased;
	-webkit-tap-highlight-color: transparent
}
body{
	background: #f6f6f6;
}
.theme-dark{
	filter: invert(100%);
}
.theme-dark img{
	filter: invert(100%);
}
.theme-dark iframe{
	filter: invert(100%);
}
.head-menu-list-wrapper {
	overflow: hidden;
	position: sticky;
	top: 0;
	z-index: 1001;
	background-color: #fff;
	transition-duration: .2s;
	transition-property: top;
	border-bottom: 1px solid #e8e8e8;
	flex-shrink: 0;
}
.head-menu-list-wrapper .head-menu-list-content {
	height: 56px;
	padding: 12px 0;
}
.head-menu-list {
	padding-left: 24px;
	padding-right: 24px;
	overflow-y: hidden;
	overflow-x: auto;
	margin-bottom: -30px;
	display: flex;
	justify-content: flex-start;
	align-items: center;
	padding-bottom: 23px;
	box-sizing: content-box;
}
.head-menu-item {
	display: inline-block;
	background: #F1F2F4;
	border-radius: 24px;
	padding: 8px 16px;
	margin-right: 8px;
	font-weight: 600;
	font-size: 14px;
	line-height: 16px;
	flex-shrink: 0;
	cursor: pointer;
	text-decoration: none;
	color: #000;
}
.head-menu-item:active,
.head-menu-item:hover,
.head-menu-item-active {
	font-weight: 700;
	background: #6638dd;
	color: #fff;
}

.dish-list {
	width: 100%;
	max-width: 600px;
	margin: 0 auto;
	padding-top: 56px;
}
.dish-list:first-child {
	padding-top: 24px;
}
h2.title {
	font-weight: 800;
	font-size: 24px;
	line-height: 32px;
}
.menu-list-item {
	padding-bottom: 24px;
	margin-top: 24px;
	border-bottom: 1px solid #e8e8e8;
	position: relative;
	display: flex;
	justify-content: space-between;
	gap: 12px;
	cursor: pointer;
}
.menu-list-item .menu-list-item-content {
	position: relative;
	transition: padding-top .2s ease 0s;
}
.menu-list-item .menu-list-item-content h4.item-title {
	font-style: normal;
	font-weight: 600;
	font-size: 16px;
	line-height: 20px;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
	overflow: hidden;
	cursor: pointer;
}
.price {
	font-weight: 800;
	font-size: 14px;
	font-size: 18px;
	line-height: 24px;
	margin-top: 2px;
}
.image-wrapper {
	max-width: 100px;
	height: 75px;
	flex-shrink: 0;
	cursor: pointer;
	border-radius: 16px;
	-webkit-border-radius: 16px;
	-moz-border-radius: 16px;
	width: 100%;
	position: relative;
	transition: all .2s ease 0s;
}
.image-wrapper img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	border-radius: 12px;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
}
</style>
<div class="container">
	<div class="head-menu-list-wrapper">
		<div class="head-menu-list-content">
			<div class="head-menu-list">
				@foreach($categories as $category)
					@if(!$category->itemsActive->count())
						@continue
					@endif
					<a href="#cat_{{ $category->id }}" class="head-menu-item">{{ $category->name }}</a>
				@endforeach
			</div>
		</div>
	</div>
	@foreach($categories as $category)
		@if(!$category->itemsActive->count())
			@continue
		@endif
		<div class="dish-list" id="cat_{{ $category->id }}">
			<h2 class="title">{{ $category->name }}</h2>
			@foreach($category->itemsActive as $item)
				<div class="menu-list-item" data-item-id="72366">
					<div class="menu-list-item-content">
						<div class="menu-list-item-text-wrapper">
							<h4 class="item-title">{{ $item->name }}</h4>
							<div class="">
							<span class="price">{{
									number_format($item->price, 
										tpl_options('price_precision'), 
										tpl_options('decimal_separator'),
										tpl_options('thousands_separator')).
									(tpl_options('space_after_price') ? ' ' : '').
									tpl_options('currency_symbol') 
								}}</span>
								{{-- <span class="amount">{{ $item->volume }}</span> --}}
							</div>
							<div class="item-description">{{ $item->description }}</div>
							<div class="item-description">{{ $item->volume }}</div>
						</div>
					</div>
					<div class="image-wrapper">
						<img src="{{ $item->image }}" alt="{{ $item->name }}">
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
</div>
@endsection
