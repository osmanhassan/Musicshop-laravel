<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderNotification;
use App\Product;
use App\User;

class NotificationController extends Controller
{
   function index(Request $request){

    	$user = User::find(session('user')->id);

    	$count = 0;

		foreach($user->unreadNotifications as $notification)

             $count++;
	       
        if($count != 0)
            echo $count;

    	
    }


    function giveNotification(){

        $user = User::find(session('user')->id);

        foreach($user->unreadNotifications as $notification){

            $array = unserialize($notification->data['customer']);

            $name = $array['name']; 
            $OrderId = $notification->data['OrderId'];

            //header("Content-Type: text/plain");
            echo '<li style="margin: 0 0 10px 0;background-color: gray">
                            <div class="fit" onclick="window.location.href='."'".'/order/'.$OrderId."'".'"  style="background-color: gray;text-align: left;line-height: 20px;padding: 10px">New order from '. $name.'</div></li>'; 

           

        }
        
     }


}