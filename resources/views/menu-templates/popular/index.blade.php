@extends('layouts.empty')

@section('content')
<style>
body,
.item-name,
.item-price{
	background: #fff;
	background: rgb(28, 21, 21);
	color: rgb(255, 248, 248);
}
.category-list{

}
.category-item{

}
.category-name{

}
.item-list{

}
.item-item{

}
</style>
<div class="container mt-5 px-5_ mb-10">
	<div class="category-list row gx-8">
		@foreach($categories as $category)
			<div class="category-name pt-4">
				<h2 class="h2 m-0">{{ $category->name }}</h2>
			</div>
			@foreach($category->itemsActive as $item)
				<div class="col-sm-12 col-md-4 col-lg-3">
					<a class="d-block border-md-0 text-body text-decoration-none py-4 pb-sm-6 
                    border-sm-bottom border-light">
                    	<div class="row gx-4">

                    		<div class="col-4 col-md-12 mb-2 pt-1">
                    			<div style="display:block;overflow:hidden;position:relative;box-sizing:border-box;margin:0">
	                    			<div style="display:block;box-sizing:border-box;padding-top:100%"></div>
	                    			<img src="{{ $item->image }}" alt="" class="rounded with-placeholder" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;">
	                    		</div>
                    		</div>

                    		<div class="col-8 col-md-12">
							    <p class="fs-5 fw-bold mb-1 text-break item-name" itemprop="name">{{ $item->name }}</p>
							    <div itemprop="description" class="text-muted text-break overflow-hidden small" style="max-height:69px">{{ $item->description }} <br>
							    </div>
							    <div class="mb-2"></div>
							    <div itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
							        <meta itemprop="price" content="299">
							        <meta itemprop="priceCurrency" content="UAH">
							        <span class="mt-1 float-start item-price">{{
											number_format($item->price, 
												tpl_options('price_precision'), 
												tpl_options('decimal_separator'),
												tpl_options('thousands_separator'))
											 . ' ' . tpl_options('currency_symbol') 
										}}
									</span>
							    </div>
							</div>

                    	</div>
                	</a>
				</div>
			@endforeach
		@endforeach
	</div>
</div>
@endsection
