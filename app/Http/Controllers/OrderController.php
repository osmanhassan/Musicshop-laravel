<?php

namespace App\Http\Controllers;

use App\User;
use App\order;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Notifications\OrderNotification;

class OrderController extends Controller
{
    
	function index(){

		if(sizeof(session('cart'))> 0){

			$catagories = DB::table('products')
							->distinct()->get(['catagory']);

			return view('customer.order')

				->with('catagories', $catagories);


		}

		else{
			return redirect()->route('dashboard.index');
		}

	}

	function verify(OrderRequest $request){

		$orders = session('cart');

		$total = 0;

		$revenue = 0;

		foreach($orders as $order){

			$product = product::find($order['id']);

			$product->quantity = $product->quantity - 1;

			$revenue += $product->price - $product->bprice;

			$product->save();

			$total += $order['price'];

		}

		
		$orders = serialize($orders);

		$customer = [

			'name' => $request->name,
			'phone' => $request->phone,
			'address' => $request->address,
			'bkash' => $request->bkash,

		];

		$customer = serialize($customer);

		$order = new order();

		$order->customer = $customer;

		$order->orders = $orders;

		$order->revenue = $revenue;

		date_default_timezone_set('Asia/Dhaka');

		$order->date = date('Y-m-d');

		$order->save();

		session()->pull('cart');

		$users = User::all();
		
		$order = order::orderBy('id', 'desc')->first();
		
		foreach($users as $user)

			$user->notify(new OrderNotification($order['id'], $customer));

		$message = 'Order placed successfully.!Total bill: '.$total.'.!You have to send BDT. '. 22/100*$total .'!to bkash agent number: 017xxxxxxxxx.(20% of total amount including bkash charge.)';

		$message = explode("!", $message);

		session()->flash('message', $message);

		return redirect()->route('dashboard.index');

	}

	

}
