@extends('main')
@section('title', '| Products')
@section('content')

<div class="container">  
    <div class="row">
        <div class="col-sm-2">

            <div style="padding-top: 10px; padding-bottom: 10px;">Price (RM)</div>  
            <div class='price-filter-form'>
             {!! Form::open(['method' => 'GET','route' => ['getProductByCategoryPrice',$category->name]]) !!} 
            {{ Form::text('start_price',null, ['class' => 'amount-start','placeholder'=>'Min']) }}
            <div class="amount-divider">-</div>
            {{ Form::text('end_price',null, ['class' => 'amount-end','placeholder'=>'Max']) }}
            {{ Form::button('',['class' => 'price-filter-btn','type'=>'submit' ]) }}
                
      
        </div>
        <div class="rating-filter-title">Rating</div>
        <div class="rating-container">
            <ul>@if(empty($minPrice) || empty($maxPrice))
                <a href={{ route('getProductByRating',['category'=>$category->name,'rate'=>5]) }}>

                @else
                <a href={{ route('getProductByCategoryPriceRating',['category'=>$category->name,'start_price'=>(empty($minPrice) ? null : $minPrice),'end_price'=>empty($maxPrice) ? null : $maxPrice,'rate'=>5]) }}>
                @endif
                <li>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </li></a>

                @if(empty($minPrice) || empty($maxPrice))
                <a href={{ route('getProductByRating',['category'=>$category->name,'rate'=>4]) }}>

                @else
                <a href={{ route('getProductByCategoryPriceRating',['category'=>$category->name,'start_price'=>(empty($minPrice) ? null : $minPrice),'end_price'=>empty($maxPrice) ? null : $maxPrice,'rate'=>4]) }}>
                @endif
                <li>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="and-up">And Up</span>
                </li></a>

                @if(empty($minPrice) || empty($maxPrice))
                <a href={{ route('getProductByRating',['category'=>$category->name,'rate'=>3]) }}>

                @else
                <a href={{ route('getProductByCategoryPriceRating',['category'=>$category->name,'start_price'=>(empty($minPrice) ? null : $minPrice),'end_price'=>empty($maxPrice) ? null : $maxPrice,'rate'=>3]) }}>
                @endif
                <li>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="and-up">And Up</span>
                </li></a>
                
                @if(empty($minPrice) || empty($maxPrice))
                <a href={{ route('getProductByRating',['category'=>$category->name,'rate'=>2]) }}>

                @else
                <a href={{ route('getProductByCategoryPriceRating',['category'=>$category->name,'start_price'=>(empty($minPrice) ? null : $minPrice),'end_price'=>empty($maxPrice) ? null : $maxPrice,'rate'=>2]) }}>
                @endif

                <li>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="and-up">And Up</span>
                </li></a>

                @if(empty($minPrice) || empty($maxPrice))
                <a href={{ route('getProductByRating',['category'=>$category->name,'rate'=>1]) }}>

                @else
                <a href={{ route('getProductByCategoryPriceRating',['category'=>$category->name,'start_price'=>(empty($minPrice) ? null : $minPrice),'end_price'=>empty($maxPrice) ? null : $maxPrice,'rate'=>1]) }}>
                @endif  

                <li>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="and-up">And Up</span>
                </li></a>
            </ul>
        </div>
        </div>
        <div class="tab-content col-sm-9">
            @foreach($products->chunk(4) as $productChunck)
            <div class="row">
                @foreach($productChunck as $product)
                <div class="col-sm-3">
                    <a href="{{ url('productdetail/'.$product->sku.'/'.$product->id) }}">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to($product->imagePath) }}" alt=""/>
                                    <h2>{{ $product->price }}</h2>
                                    <p>{{ $product->name }}</p>
                                    <div class="product-category-rating">

                                            <div style="float: left;">
                                                @for ($i = 0; $i < $product->rating; $i++)
                                                <span class="fa fa-star"></span>
                                                @endfor
                                                @for ($i = $product->rating; $i < 5 ; $i++)
                                                <span class="fa fa-star-o"></span>
                                                @endfor
                                            </div>
                                            
                                            <div style="float: left; color: grey; margin-left: 2px;">    
                                                @if($product->rating!= null)
                                                ({{$product->ratingcount}})    
                                                @endif
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</div>
@endsection