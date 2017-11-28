<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function AddDelete(Request $request){

    	if($request->has('name')){

	    	$request->session()->push('cart', [
			   'id' => $request->id,
			   'name' => $request->name,
			   'price' => $request->price,
			]); 
	    	
	    	//var_dump(session()->get('cart'));
	    	//session()->pull('cart');
	    	/*$cart = session()->get('cart');

	    	foreach ($cart as $key => $x) {

	    		if($x['name'] == 'sd')
	    			
	    			unset($cart[$key]);
	    	}
	    	$request->session()->put('cart', $cart);*/

	    	$text = $request->name . " is added to cart.";
	    	
	    	echo $text;

    	}
    	else{

    		$cart = session()->get('cart');

	    	foreach ($cart as $key => $x) {

	    		if($x['id'] == $request->id){
	    			
	    			$request->total = $request->total - $x['price'];

	    			unset($cart[$key]);

	    			echo $request->total ;
	    			
	    			break;

	    		}
	    	}

	    	$request->session()->put('cart', $cart);

	    	

    	}	

    }

    function show(){

    	$catagories = DB::table('products')
							->distinct()->get(['catagory']);

    	if(session()->has('cart') and sizeof(session('cart')) > 0)

		return view('customer.cart')

			->with('catagories', $catagories)

			->with('carts',session()->get('cart'));

		else {

			$message = 'At first add product to cart to show cart.!' ;

			$message = explode('!', $message);

			session()->flash('message', $message);

			return redirect()->route('dashboard.index');

		}

    }
}
