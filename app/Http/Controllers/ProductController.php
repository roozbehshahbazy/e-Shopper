<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_option;
use App\Product_options_value;
use Session;
use App\SearchLog;
use Auth;
use App\Category;
use DB;
use App\Rating;




class ProductController extends Controller
{
    
    	/*public function getProduct() {
    	$products=Product::where('status',1)->paginate(4);
    	return view('product/index', compact('products'));



	}*/


	public function getProductDetail($sku,$id) {

		$product= Product::where('sku','=', $sku)->first();
		$colorlabel = $product->options()->where('option_name', '=', 'color')->first();
		$sizelabel = $product->options()->where('option_name', '=', 'size')->first();
		$colorvalue= $product->OptionValues()->where('product_options.option_name', '=', 'color')->pluck('value','value');
		$sizevalue= $product->OptionValues()->where('product_options.option_name', '=', 'size')->pluck('value','value');
		$rating =$product->ProductRating()->avg('rating');

		return view('productdetail/productinfo', compact('product','colorlabel','colorvalue','sizelabel','sizevalue','rating'));

	}


	public function ProductSearch(Request $request){

		$q=$request->input('q');
		$log = new SearchLog();
		$log->ip= \Request::ip();
		if(Auth::user()){
			
			$log->user_id=Auth::user()->id;
		}
		else {
			$log->user_id='guest';
		}
		
		$log->request=$q;
		$log->save();
		$products= Product::where('name','like', '%'.$q.'%')->paginate(4);

		return view('product/searchproduct', compact('products'));

	}


	public function getProductByCategory($category){


		$category=Category::where('name','=',$category)->first();
		$products=$category->products()
		->where('status',1)
		->paginate(4);

		foreach ($products as $product) {
			$product['rating']=$product->ProductRating()->avg('rating');
			$product['ratingcount']=$product->ProductRating()->count('rating');

		}
		
		return view('product/index', compact('products','category'));




	}

	public function getProductByCategoryPrice(request $request,$category){

		$minPrice=$request->input('start_price');
		$maxPrice=$request->input('end_price');
		$category=Category::where('name','=',$category)->first();
		$products=$category->products()
						   ->whereBetween('price',[$minPrice, $maxPrice])
						   ->where('status',1)
						   ->paginate(4);

		foreach ($products as $product) {
			$product['rating']=$product->ProductRating()->avg('rating');
			$product['ratingcount']=$product->ProductRating()->count('rating');

		}
		
		return view('product/index', compact('products','category','minPrice','maxPrice'));



	}

	 public function getProductByRating(Request $request,$category,$rate){


		$category=Category::where('name','=',$category)->first();

		$products = DB::table('products')
		            ->join (DB::raw('(select a.id,avg(b.rating)  as rating,count(b.rating) as ratingcount,a.category_id
                                     from products a join ratings b on a.id=b.product_id
                                     GROUP by a.id,a.category_id) as s'),'products.id','=','s.id')
		            ->where('rating','>=',$rate)
		            ->where('products.category_id','=',$category->id)
		            ->where('status',1)
		            ->select('*')
                    ->paginate(4);

		return view('product/index', compact('products','category'));       

		

	}

	public function getProductByCategoryPriceRating(Request $request,$category,$minPrice,$maxPrice,$rate){

	 	
	 	$minPrice=$request->start_price;
	 	$maxPrice=$request->end_price;
	 	$category=Category::where('name','=',$category)->first();
	 	$products = DB::table('products')
		            ->join (DB::raw('(select a.id,avg(b.rating)  as rating,count(b.rating) as ratingcount,a.category_id
                                     from products a join ratings b on a.id=b.product_id
                                     GROUP by a.id,a.category_id) as s'),'products.id','=','s.id')
		            ->where('rating','>=',$rate)
		            ->where('products.category_id','=',$category->id)
		            ->where('status',1)
		            ->whereBetween('price',[$minPrice, $maxPrice])
		            ->select('*')
                    ->paginate(4);
        

        return view('product/index', compact('products','category','minPrice','maxPrice'));



	 	
		
	}


}