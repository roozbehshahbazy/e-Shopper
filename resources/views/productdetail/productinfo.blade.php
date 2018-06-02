@extends('main')
@section('title', "| $product->name")
@section('content')
<div class="container">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="product-details">
			
			<div class="col-sm-5">
				<div class="view-product">
					<img class="image-zoom" src="{{'/'.$product->imagePath }}">
					<script>
						$(document).ready(function(){
						$('.image-zoom')
						.wrap('<span style="display:inline-block"></span>')
						.css('display', 'block')
						.parent()
						.zoom({
						url: $(this).find('img').attr('data-zoom')
						});
						});
					</script>
				</div>
				<div class="product-detail-rating">

                    @for ($i = 0; $i < $rating; $i++)
                    	<span class="fa fa-star"></span>
                    @endfor

                    @for ($i = $rating; $i < 5 ; $i++)
                    	<span class="fa fa-star-o"></span>
                    @endfor
				</div>
			</div>
			
			<div class="col-sm-7">
				<div class="product-information">
					<h2>{{ $product->name }}</h2>
					<p>Product ID: {{ $product->id }} </p>
					
					<span>
						<span>{{ 'RM '.$product->price }}</span>
						
					</span>
					<p><b>Availability:</b> {{ $product->quantity > 0 ? 'In Stock' : 'Sold Out' }}</p>
					<div class="col-sm-5 product-option">
						{!! Form::open(['method' => 'POST','route' => ['addtocart', $product->sku, $product->id]]) !!}
						
						@if(!empty($colorlabel))
						{{ Form::label('color', "Color") }}
						{{ Form::select('color', $colorvalue, null, ['placeholder' => '- Pick a color -']) }}
						@if ($errors->has('color'))
						<p style="color:red;"> {{ $errors->first('color') }}</p>
						@endif
						@endif
						
						@if(!empty($sizelabel))
						{{ Form::label('size', "Size") }}
						{{ Form::select('size', $sizevalue , null, ['placeholder' => '- Pick a size -']) }}
						@if ($errors->has('size'))
						<p style="color:red;"> {{ $errors->first('size') }}</p>
						@endif
						@endif
						{{ Form::button('<i class="fa fa-shopping-cart"></i> Add to cart', ['class' => 'btn btn-fefault cart', 'type' => 'submit']) }}
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection