@extends('layouts.bootstrap')

@section('title', $title ?? 'Menu')

@section('content')
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
<style>
	/* cyrillic */
@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: local('Montserrat Regular'), local('Montserrat-Regular'), url(/fonts/Montserrat-Regular.woff2) format('woff2');
}
@font-face {
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    font-display: swap;
    src: local('Montserrat Bold'), local('Montserrat-Bold'), url(/fonts/Montserrat-Bold.woff2) format('woff2');
}
body{
	background: #fff;
	color: #555;
	font-family: 'Montserrat',sans-serif;
}
.logo-wrapper{
	border-bottom: 1px solid #e3e3e3;
}
.logo{
	max-height: 80px;
	max-width: 100%;
}
.category-card{
	border-radius: 12px;
    border: none;
    font-size: 14px;
    border: 2px solid #eaeaea;
    background-color: #fff;
    cursor: pointer;
    overflow: hidden;
    display: inline-flex;
    width: 100%;
}
.item-card{
	border-radius: 10px;
    border: none;
    font-size: 14px;
/*    box-shadow: 0 2px 16px rgb(6 2 102 / 25%);*/
    border: 1px solid #eaeaea;
    background-color: #fff;
    cursor: pointer;
    overflow: hidden;
    margin: 0 -7px;
}
.card-title{
    font-size: 13px;
    font-weight: 600;
    padding: 10px;
    text-transform: uppercase;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow-x: hidden;
    margin-bottom: 0;
}
.category-card-title{
	border-top: 4px solid;
}
.card-body{
	flex: 1 1 auto;
    min-height: 1px;
    padding: 0;
}
.card-img-bottom{
    width: 100%;
    position: relative;
    padding-top: 67%;
    height: 100%;
}
.card-img-bottom img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
/*    object-fit: contain;*/
}
.card-description{
	padding: 0 10px;
    font-size: 12px;
    max-height: 40px;
    overflow: hidden;
    margin: -5px 0 5px 0;
}
.item-card .price{
	font-size: 24px;
	font-weight: bold;
}
.footer .sl-img-link {
    height: 44px;
    width: 44px;
    display: inline-block;
    margin: 5px;
    background-repeat: no-repeat;
    background-color: #fff;
    border-radius: 50%;
}
.category-item:not(.active) .card{
	border-color: #eaeaea!important;
}
</style>
<div class="container py-2">
	@if(tpl_options('show_logo'))
	<div class="logo-wrapper text-center mb-3 pb-4">
		<img src="{{ $company->image }}" alt="" class="logo">
	</div>
	@endif
	<h2 class="text-center mb-3">{{ _t('template_way.menu') }}</h2>
	<main>
		<h4>{{ _t('template_way.categories') }}</h4>
		<nav>
			<div class="row_ mb-3" id="nav-tab" role="tablist">
				<div class="owl-carousel owl-theme">
					<?php $color = rand_color(); ?>
					<div class="_col-6 _col-md-4 _col-lg-3 active _mb-4 category-item" id="" data-bs-toggle="tab" data-bs-target="#category-all" type="button" role="tab" aria-controls="nav-general" aria-selected="true">
						<div class="card category-card" style="border-color: {{ $color }}">
							<div class="card-title category-card-title" style="border-color: {{ $color }};">{{ _t('template_way.all_categories') }}</div>
							<div class="card-body">
								<div class="card-img-bottom">
	                                {{-- <img src="/images/all-food.jpg" alt=""> --}}
	                                <img src="/images/cover-1000.jpg" alt="">
	                            </div>
							</div>
						</div>
					</div>
					@foreach($categories as $category)
						<?php $color = rand_color(); ?>
						<div class="_col-6 _col-md-4 _col-lg-3 _mb-4 category-item" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#category-{{ $category->id }}" type="button" role="tab" aria-controls="nav-general" aria-selected="true">
							<div class="card category-card" style="border-color: {{ $color }}">
								<div class="card-title category-card-title" style="border-color: {{ $color }};">{{ $category->name }}</div>
								<div class="card-body">
									<div class="card-img-bottom">
	                                    <img src="{{ $category->image }}" alt="{{ $category->name }}">
	                                </div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</nav>
		<div class="tab-content" id="">
			<div class="tab-pane fade show active" id="category-all" role="tabpanel" aria-labelledby="category-all">
				@foreach($categories as $category)
					<h5>{{ $category->name }}</h5>
					<div class="row" style="padding: 0 7px;">
					@foreach($category->itemsActive as $item)
						<div class="col-6 col-md-4 col-lg-3 mb-4">
							<div class="card item-card">
								<div class="card-body">
									<div class="card-img-bottom">
	                                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
	                                </div>
								</div>
								<div class="card-title">{{ $item->name }}</div>
								<div class="card-description">{{ $item->description }}</div>
								<div class="card-bottom d-flex" style="padding: 0 10px;">
									<div class="price me-2">
										{{ number_format($item->price, 
												tpl_options('price_precision'), 
												tpl_options('decimal_separator'),
												tpl_options('thousands_separator')).
											(tpl_options('space_after_price') ? ' ' : '').
											tpl_options('currency_symbol') }}
									</div>
									<div class="volume">{{ $item->volume }}</div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				@endforeach
			</div>
			@foreach($categories as $category)
			<div class="tab-pane fade" id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-profile-tab">
				<h5>{{ $category->name }}</h5>
				<div class="row" style="padding: 0 7px;">
				@foreach($category->itemsActive as $item)
					<div class="col-6 col-md-4 col-lg-3 mb-4">
						<div class="card item-card">
							<div class="card-body">
								<div class="card-img-bottom">
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
                                </div>
							</div>
							<div class="card-title">{{ $item->name }}</div>
							<div class="card-description">{{ $item->description }}</div>
							<div class="card-bottom d-flex" style="padding: 0 10px;">
								<div class="price me-2">
									{{ number_format($item->price, 
											tpl_options('price_precision'), 
											tpl_options('decimal_separator'),
											tpl_options('thousands_separator')).
										(tpl_options('space_after_price') ? ' ' : '').
										tpl_options('currency_symbol') }}
								</div>
								<div class="volume">1st.</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
			@endforeach
			{{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> --}}
		</div>
	</main>
	<ul class="category-list">
		@foreach($categories as $category)
		@break
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
<footer class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer-info">
                	@if(tpl_options('footer_phone'))
                    <a href="tel:{{ tpl_options('footer_phone') }}">{{ tpl_options('footer_phone') }}</a><br>
                    @endif
                	@if(tpl_options('footer_email'))
                    <a href="mailto:{{ tpl_options('footer_email') }}">{{ tpl_options('footer_email') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-md-5 footer-col">
                @if(tpl_options('footer_instagram') || tpl_options('footer_telegram'))
                <div class="footer-sl-title">
                    <b>{{ _t('template_way.social_media') }}</b>
                </div>
                <div class="footer-sl-links inline">
                	@if(tpl_options('footer_instagram'))
                    <a href="{{ tpl_options('footer_instagram') }}" class="sl-img-link text-decoration-none sl-instagram" target="_blank" rel="noreferrer"
                    	style="background-image: url('https://demo.menu.wayforpay.com/img/social/instagram.svg')">&nbsp;</a>
                    @endif
                	@if(tpl_options('footer_telegram'))
                    <a href="{{ tpl_options('footer_telegram') }}" class="sl-img-link text-decoration-none sl-telegram" target="_blank" rel="noreferrer"
                    	style="background-image: url('https://demo.menu.wayforpay.com/img/social/telegram.svg')">&nbsp;</a>
                    @endif
                </div>
                @endif
            </div>
            <div class="col-md-3 footer-col">
                <a href="/" target="_blank" rel="noreferrer" class="my-3 d-inline-block">
                    {{-- <img src="/images/qr-online-menu-logo.svg" alt="WayForPay" width="160" height="32"> --}}
                    {{-- <img src="/svg/qr-menu-logo-2.svg" alt="" width="240"> --}}
                </a>
                <p class="copyright text-muted" style="font-size: 0.8em">Створено за допомогою <a href="http://qr-menu.space/" rel="noreferrer" target="_blank">qr-menu.space</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js" crossorigin="anonymous"></script>
{{-- <script src="/menu-templates/way-1/js/owl.carousel.js" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(document).ready(function() {
	$('.owl-carousel').owlCarousel({
		margin: 10,
		nav: true,
		dots: true,
		loop: false,
		responsive: {
			0: { items: 3 },
			600: { items: 3 },
			1000: { items: 5 }
		}
	})
})
</script>
@endsection
