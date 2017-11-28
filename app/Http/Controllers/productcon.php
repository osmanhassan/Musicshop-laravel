<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\UploadedFile;

use App\Product;

class productcon extends Controller
{
	public function index()
    {
    	$product = DB::table('products')
    					->paginate(12);

        $catagories =  DB::table('products')
                            ->distinct()->get(['catagory']);

    	return view('user.product')
    	->with('product', $product)
        ->with('catagories', $catagories);
    }

    function StockOut(){

        $product = DB::table('products')
                        ->where('quantity', '<', 1)->paginate(12);
                        
        $catagories =  DB::table('products')
                            ->distinct()->get(['catagory']);
                            
        return view('user.product')
        ->with('product', $product)
        ->with('catagories', $catagories);

    }

    function ShowCatagory( Request $request){

        $product = DB::table('products')
                        ->where('catagory', $request->catagory)->paginate(12);
                        
        $catagories =  DB::table('products')
                            ->distinct()->get(['catagory']);
                            
        return view('user.product')
        ->with('product', $product)
        ->with('catagories', $catagories);
    }

    function giveNames(Request $request){

        $term = $request->term;
        $products = DB::table('products')
            ->where('name', 'like', "%$term%")
            ->get();
        $names = [];
        foreach($products as $product)
        {
            array_push($names, $product->name);
        }
       return response()->json($names);
       
        //var_dump($names);
    }

    function search(Request $request){

        Validator::make($request->all(), [
            'search' => 'required'
        ])->validate();

         $product = DB::table('products')
            ->where('name', $request->search)
            ->paginate(12);

         $catagories =  DB::table('products')
                            ->distinct()->get(['catagory']);

        return view('user.product')
        ->with('product', $product)
        ->with('catagories', $catagories);

    }
    

    public function create()
    {
    	return view('user.add');
    }

    public function store(ProductRequest $request)
    {
        if($request->SellingPrice < $request->BuyingPrice){

            $massage = 'Selling Price can not be less than buying price.';

            session()->flash('massage', $massage);

            return redirect()->route('product.create');
        }
    	$pro = new Product();
    	$pro->name = $request->name;
        $pro->price = $request->SellingPrice;
    	$pro->bprice = $request->BuyingPrice;
    	$pro->model = $request->model;
    	$pro->catagory = $request->catagory;
        $pro->quantity = $request->quantity;
    	
    	$pro->save();
    	return redirect()->route('product.index');
    }

    public function show($id)
    {
    	$product = DB::table('products')
    		->where('id', $id)
    		->first();

    	return view('product.show')
    		->with('product', $product);
    }

    public function edit($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();

        return view('user.edit')
            ->with('product', $product);
    }

    public function update(ProductRequest $request)
    {
        $id = $request->id;
        $pro = Product::find($id);
        
        $pro->name = $request->name;
        $pro->price = $request->SellingPrice;
        $pro->bprice = $request->BuyingPrice;
        $pro->model = $request->model;
        $pro->catagory = $request->catagory;
        $pro->quantity = $request->quantity;
        
        $pro->save();
        return redirect()->route('product.index');
    }

    public function delete(Request $request){

         $pro = Product::find($request->id);

         $pro->delete();

         return redirect()->route('product.index');

    }

    function ChangeImage(Request $request){

        $file = $request->file('pic');

        $location = $request->id.'.'.$file->getClientOriginalExtension();

        $file->move('uploads', $location);
        
        

        $location = '/uploads/' . $location;

        $product = Product::find($request->id);

        $product->image = $location;

        $product->save();

        echo $location. '?nocache=<' . time();

    }
}
