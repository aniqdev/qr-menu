@extends('layouts.empty')

@section('title', $title ?? 'Menu')

@section('body-classes', 'theme-' . tpl_options('theme'))

@section('content')
<link rel="stylesheet" href="/css/lightbox.min.css">
<link rel="stylesheet" href="/templates/choice/choice-{{ tpl_options('theme', 'light') }}.css">
<style>
@media (prefers-reduced-motion:no-preference) {
	:root {
		scroll-behavior: smooth
	}
}
body{
	padding: 1px 0;
}
iframe{
	width: 100%;
}
.text-center{
	text-align: center;
}
.logo-wrapper{
	margin-top: 15px;
}
.company-name{
	margin-bottom: 5px;
	font-family: cursive;
}
.company-description{
	margin: 0 auto 15px;
	width: 80%;
	text-align: center;
	font-size: 0.9em;
}
.styles_mobile-section-menu-body__CueSw{
	width: 100%;
	max-width: 600px;
	margin: auto;
}
.styles_mobile-categories-tabs__xmj3r {
	background-color: var(--theme-colors-100);
	box-shadow: 0 0 16px 0 var(--theme-colors-900-a10);
}
.styles_mobile-categories-tabs__xmj3r {
	display: flex;
	overflow-x: auto;
	flex-wrap: nowrap;
	-webkit-overflow-scrolling: touch;
	padding: 8px 16px;
	position: -webkit-sticky;
	position: sticky;
	z-index: 2;
	top: 0;
}
.styles_mobile-categories-tabs__xmj3r .styles_category-item__IGNFo {
	margin-right: 4px;
	border-radius: 8px;
	padding: 0 12px;
	white-space: nowrap;
}
.styles_button__eH6h8:hover,
.styles_button__eH6h8:active{
	border-width: 1px;
	border-style: solid;
	color: var(--primary-color);
	border-color: var(--primary-color);
	box-shadow: inset 0 0 0 1px var(--primary-color);
}
</style>
<div class="styles_mobile-section-menu-body__CueSw">

	@if(tpl_options('show_logo'))
	<div class="text-center logo-wrapper" {{ tpl_options('show_logo') ? 'true' : 'false'}}>
		<img src="{{ $company->image }}" alt="" class="img-thumbnail my-3"
			style="max-height: 200px;" 
		>
	</div>
	@endif

	@if(tpl_options('show_company_name'))
	<h1 class="text-center company-name">{{ $company->name }}</h1>
	@endif

	@if(tpl_options('header_text'))
	<p class="company-description">{{ tpl_options('header_text') }}</p>
	@endif

	<div class="styles_mobile-categories-tabs__xmj3r" id="mobile-categories-tabs">
		@foreach($categories as $category)
			@if(!$category->itemsActive->count())
				@continue
			@endif
		<a id="mobile-category-tab-item-salati" href="#category_{{ str()->slug($category->name) }}">
			<button class="styles_button__eH6h8 styles_sizeSmall__PbM78 styles_appearanceStroke__2w0V8 styles_category-item__IGNFo">{{ $category->name }}</button>
		</a>
		@endforeach
	</div>
	<div id="mobile-section-menu" class="mobile-section-menu styles_menu__T1oSZ">
		@foreach($categories as $category)
			@if(!$category->itemsActive->count())
				@continue
			@endif
	   <div id="category_{{ str()->slug($category->name) }}" class="category-observer-js styles_menu-category__R1fOI styles_menuCategoryMobile__iVi2O styles_menuCategoryTemplate__rYkZn">
		  <div class="styles_menuCategoryInfo__ysFW5">
			 <div class="styles_menu-category-title__GU2xx">{{ $category->name }}:</div>
		  </div>
		  <div class="styles_menuCategoryList__3LkuM">
			@foreach($category->itemsActive as $item)
			 <div class="styles_menu-item__K3Y0r">
				<div class="styles_menu-item-left__aENNx">
				   <div class="styles_menu-item-title__92eAl">{{ $item->name }}</div>
				   <div class="styles_menu-item-price__H0JSQ">
					  <div class="styles_PriceDiscount__Kccnr styles_discount__XM9HB">
						@foreach($item->prices_arr as $price)
							{{
								number_format($price,
									tpl_options('price_precision'),
									tpl_options('decimal_separator'),
									tpl_options('thousands_separator')).
								(tpl_options('space_after_price') ? ' ' : '').
								tpl_options('currency_symbol')
							}}
							{{ !$loop->last ? ' / ' : '' }}
						@endforeach
					  </div>
				   </div>
				   <div class="styles_menu-item-description__jSMJ6">
					  <div class="styles_CollapsedText__blArN styles_collapsed__3d5qr styles_line_lampShort__JCqRm">
						 <pre>{{ $item->description }}</pre>
					  </div>
				   </div>
				   @if($item->volume)
				   <div class="styles_menu-label-list__YC7Iy">
					  <div class="styles_menu-label__UhWo8">
						@include('menu-templates/choice/svg/vesy-svg')
						@foreach($item->volumes_arr as $volume)
						  {{ $volume }}
						  {{ !$loop->last ? ' / ' : '' }}
						@endforeach
					  </div>
				   </div>
				   @endif
				   {{-- <div class="styles_menu-item-controls__ZA9cY">
					  <div class="styles_wishBtn__ptI5i">
						 <div class="styles_wishBtnIconHolder__3_ALf">
							@include('menu-templates/choice/svg/heart-svg')
						 </div>
						 <div class="styles_wishBtnCountHolder___Codu" data-projection-id="1" style="opacity: 1; width: auto; transform: translateX(0%) translateZ(0px);">
							<div class="styles_wishBtnCount__EDYkz">{{ rand(2,18) }}</div>
						 </div>
					  </div>
				   </div> --}}
				</div>
				@if($item->has_image)
				<div class="styles_menu-item-right__ARHxs">
					<a href="{{ $item->image }}" data-lightbox="img-preview-{{ $item->id }}">
						<img {{-- loading="lazy" --}} src="{{ $item->image_small }}" alt="">
					</a>
				</div>
				@endif
			 </div>
			 @endforeach
		  </div>
	   </div>
	   @endforeach
	   <div class="styles_menuToTop__9vHrM">
		  <a href="#" class="styles_button__eH6h8 styles_sizeExtraLarge__CKjnf styles_appearanceStroke__2w0V8 styles_fullWidth__n1V8K">
			 <div class="styles_menuToTopIcon__lqez4">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				   <path d="M21 17L12 8L3 17" stroke="currentColor" stroke-width="2"></path>
				</svg>
			 </div>
			 <div class="styles_menuToTopText__uunk8">{{ _t('template_default.go_top') }}</div>
		  </a>
	   </div>
	</div>
</div>

<div class="style_FooterWrapper__il_xu">
	<div class="styles_container__Vr_GI">
		<div class="style_FooterContent__X5nfQ">
			<div class="style_FooterBlocks__DuQR1">
				<div class="style_FooterBlockWrap__fsZih">
					@if(tpl_options('footer_address') || tpl_options('footer_phone') || tpl_options('footer_email'))
					<div class="style_FooterBlock__Hvejp">
						<p class="style_FooterLabel__mReSa">{{ _t('template_default.footer_contacts') }}</p>
						<div class="style_FooterText__OBiCy">{{ tpl_options('footer_address') }}</div>
						<div class="style_FooterText__OBiCy">
							<a href="tel:{{ tpl_options('footer_phone') }}">{{ tpl_options('footer_phone') }}</a>
						</div>
						<div class="style_FooterText__OBiCy">{{ tpl_options('footer_email') }}</div>
					</div>
					@endif
					@if(tpl_options('working_hours'))
					<div class="style_FooterBlock__Hvejp">
						<p class="style_FooterLabel__mReSa">{{ _t('template_default.working_hours') }}</p>
						<span class="style_FooterText__OBiCy">{{ tpl_options('working_hours') }}</span>
					</div>
					@endif
				</div>
				<div class="style_FooterBlockSocials__FA2AK">
					@if(tpl_options('footer_instagram') || tpl_options('footer_telegram'))
					<div class="style_FooterLabel__mReSa">{{ _t('template_default.social_media') }}</div>
					@endif
					@if(tpl_options('footer_instagram'))
					<a target="_blank" href="{{ tpl_options('footer_instagram') }}" rel="noreferrer" class="style_FooterSocials__J4a11">
						@include('menu-templates/choice/svg/instagram-icon-svg')
						<div>{{ _t('template_default.footer_instagram') }}</div>
					</a>
					@endif
				</div>
			</div>
			<div class="style_FooterBlockMap__NRGag">
				@if($tpl_google_map_src = tpl_google_map_src())
				<p class="style_FooterLabel__mReSa">На карті</p>
				<iframe src="{{ $tpl_google_map_src }}" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				@endif
				{{-- <a target="_blank" href="https://maps.google.com/?q=Shevchenka Square, 1Л, Dnipro, Dnipropetrovs'ka oblast, Ukraine, 49000" rel="noreferrer">
					<button class="styles_button__eH6h8 styles_appearanceStroke__2w0V8 styles_fullWidth__n1V8K style_FooterMapButton__7Eot7">
						@include('menu-templates/choice/svg/izvilina-icon')
						Отримати розташування
					</button>
				</a> --}}
			</div>
		</div>
	</div>
</div>

<div class="style_FooterLogo__WFxEI">
	<div class="styles_container__Vr_GI styles_isDesktop__v3bmF">
		<div class="style_FooterLogoContent__BZWH4">
			<p>{{ _t('template_default.powered_by') }}</p>
			<a href="https://qr-menu.space/" target="_blank" rel="noreferrer">qr-menu.space</a>
		</div>
	</div>
</div>


<script src="/js/jquery.min.js"></script>
<script src="/js/lightbox.min.js"></script>
<script>
	lightbox.option({
	  'resizeDuration': 200,
	  'wrapAround': true
	})
</script>
@endsection
