<?php

namespace App\Http\Controllers;

use App\User;
use App\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderNotification;

class AdminOrderController extends Controller
{
    function AllOrders(){

        $orders = order::orderBy('id', 'desc')->get();

        return view('user.orders')

            ->with('orders', $orders);

    }

    function delivered(){

            $orders = order::orderBy('id', 'desc')

                            ->where('status', 'Delivered')

                            ->get();

            return view('user.orders')

                ->with('orders', $orders);

        }

    function NotDelivered(){

        	$orders = order::orderBy('id', 'desc')

                            ->where('status', 'Not Delivered')

                            ->get();

        	return view('user.orders')

        		->with('orders', $orders);

        }

    function order(Request $request){

    	$order = order::find($request->id);
		
		date_default_timezone_set('Asia/Dhaka');

    	$time = date('Y-m-d H:i:s');
    	
    	DB::table('notifications')

			->where('id', $request->id)

			->update(['read_at' => $time, 'updated_at' => $time]);

    	return view('user.order')

    		->with('order', $order);

    }

    function deliver(Request $request){

    	$order = order::find($request->id);

        $order->status = 'Delivered';
    	$order->delivered_by = session('user')->name;
		
		date_default_timezone_set('Asia/Dhaka');

		$order->delivery_date = date('Y-m-d');

    	$order->save();

    	session()->flash('DeliveryMessage', 'Order '. $request->id . ' is delivered successfully.');

    	return redirect()->route('orders.all');

    }
}
