<?php

namespace App\Http\Controllers;

use Validator;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    

	function index(){

		$products = product::where('quantity', '>', 0)->paginate(12);

		$catagories =  DB::table('products')
							->distinct()->get(['catagory']);

		//var_dump($catagories);
		return view('customer.customer')

			->with('products', $products)

			->with('catagories', $catagories);

	}

	function ShowCatagory(Request $request){

		$products = product::where('catagory', $request->catagory)

							->where('quantity', '>', 0)

							->paginate(12);

		$p = product::where('catagory', $request->catagory)

					->where('quantity', '>', 0)

					->first();

		$catagories = DB::table('products')
							
							->distinct()

							->get(['catagory']);

		if($p != null)

			return view('customer.customer')

				->with('products', $products)

				->with('catagories', $catagories);

		else

			return redirect()->route('dashboard.index');

	}

	 function search(Request $request){
		
		Validator::make($request->all(), [
            'search' => 'required'
        ])->validate();
        
         $products = DB::table('products')
            ->where('name', $request->search)
            ->paginate(12);

         $catagories =  DB::table('products')
                            ->distinct()->get(['catagory']);

       return view('customer.customer')

			->with('products', $products)

			->with('catagories', $catagories);

    }

}
