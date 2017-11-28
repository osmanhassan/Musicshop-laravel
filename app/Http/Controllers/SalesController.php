<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;


class SalesController extends Controller
{
    
	function sales(){

		return view('user.sales');

	}

	function show(Request $request){

		if($request->has('Find')){

			if($request->has('SalesDate')){

				if(strtotime($request->SalesDate) > time()+6*3600){
					
					session()->flash('smassage','Invalid date');

					return redirect()->route('user.sales');

				}

				else{


					$date = date('Y/m/d',strtotime($request->SalesDate));

					$sales = order::where('status','Delivered')

									->where('delivery_date',$date)->get();

					//var_dump($sales);

					$count = 0;
					$grandtotal = 0;
					$totalrevenue = 0;

					foreach ($sales as $sale) {

						
						$total = 0;
						
						$orders = unserialize($sale->orders);
						$customer = unserialize($sale->customer);
						$totalrevenue += $sale->revenue;

						foreach ($orders as $order) {
							

							$total += $order['price'];


						}

						$informations[$count] = 

							[	

								'OrderId' => $sale->id,
								'CustomerName' => $customer['name'],
								'total' => $total,
								'revenue' => $sale->revenue

							];

						$grandtotal += $total;
						$count++;

					}

					if($grandtotal != 0)

						return view('user.DaySale')

								->with('informations', $informations)

								->with('total', $grandtotal)

								->with('totalrevenue', $totalrevenue)

								->with('date', $request->SalesDate);

					else

						return view('user.DaySale')

								->with('date', $request->SalesDate)

								->with('total', $grandtotal);

				}

			}

			else{

				session()->flash('smassage','Sales date is required');

				return redirect()->route('user.sales');
			}

		}

		else if($request->has('FindList')){

			if($request->has('TopsoldDate')){

				if(strtotime($request->TopsoldDate) > time()+6*3600){
					
					session()->flash('tmassage','Invalid date');

					return redirect()->route('user.sales');

				}

				else{

					$date = date('Y/m/d',strtotime($request->TopsoldDate));

					$sales = order::where('status','Delivered')

									->where('delivery_date',$date)->get();

					

					$count = 0;
					$products=null;
					foreach ($sales as $sale) {
						
						$orders = unserialize($sale->orders);

						foreach ($orders as $order) {
							
							$products[$count] = [

								'id' => $order['id'],

								'name' => $order['name'],

								'price' => $order['price']

							];

							$count++;

						}
						
					}

					if($products != null){

						$s = 1;

						for ($i = 0; $i < sizeof($products) - 1; $i++){
						
							for ($j = 0; $j < sizeof($products) - $s; $j++){

								if ($products[$j]['id'] > $products[$j + 1]['id']){

									$p = $products[$j];
									$products[$j] = $products[$j + 1];
									$products[$j + 1] = $p;
								}
								
							}

							$s++;
						}
	//var_dump($products);
						$x =0;

						for($i = sizeof($products)-1; $i >= 0; $i=$i){

							$id = $products[$i]['id'];
							$count = 0;

							while($i >= 0 && $products[$i]['id'] == $id){

								$i--;
								$count++;

							}
							 
							$pp[$x] = [

								'id' => $products[$i+1]['id'],
								'name' => $products[$i+1]['name'],
								'price' => $products[$i+1]['price'],
								'instances' => $count

							];

							$x++;

						}

						$s = 1;

						for ($i = 0; $i < sizeof($pp) - 1; $i++){
						
							for ($j = 0; $j < sizeof($pp) - $s; $j++){

								if ($pp[$j]['instances'] < $pp[$j + 1]['instances']){

									$p = $pp[$j];
									$pp[$j] = $pp[$j + 1];
									$pp[$j + 1] = $p;
								}
								
							}

							$s++;
						}

						$d = 1;
						return view('user.topsold')

							->with('products', $pp)

							->with('date', $request->TopsoldDate)

							->with('flag', $d);
						
					}

					else{

							$d = 0;
							return view('user.topsold')

								->with('date', $request->TopsoldDate)

								->with('flag', $d);
						}

				}

			}

			else{

				session()->flash('tmassage','Sales date is required');

				return redirect()->route('user.sales');
			}

		}

		else{

			$t = 18;
			$total = 0;

			for($i = 0; $i < 7; $i++){

				if($i == 0)

					$date = date('Y/m/d',time() + 6 * 3600);

				else

					$date = date('Y/m/d',time() - $i * $t * 3600);

				//echo $date;

				$sales = order::where('status','Delivered')

								->where('delivery_date',$date)

								->get();

				foreach ($sales as $sale) {
					
					$orders = unserialize($sale->orders);

					foreach ($orders as $order) {
						
						$total += $order['price'];

					}
					
				}

			}

			$prediction = $total / 7;

			if($prediction != 0)

				$prediction = 'Predicted sale amount for '. date('d/m/Y', time()+18*3600).' is '. $prediction . 'BDT/-';

			else

				$prediction = 'No data to predict';

				$flag = 2;

			return view('user.topsold')

					->with('prediction', $prediction)

					->with('flag', $flag);

		}

	}

}
