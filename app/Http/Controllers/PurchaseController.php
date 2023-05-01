<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ConsumerLookup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function orderNow()
    {
        $userId = Session::get('user')->id;

        $data = Cart::with('product')
        ->where('user_id', $userId)
        ->select(['product_id',  DB::raw('SUM(item_count) as count')])
        ->groupBy('product_id')
        ->get();

        $amount = 0;
        foreach($data as $item){
            $amount=$amount+( $item['count']* $item['product']['price']);
            // echo"Price= ";
            // print($item['product']['price'].'*'.$item['count']);
            // echo"\n";
        }
        $deliveryLookups=ConsumerLookup::where('lookup_key','DELIVERY_CHARGES')->first('lookup_value');
        $deliveryCharges=json_decode($deliveryLookups->lookup_value);
        return view('orderNow',['products'=>$data, 'amount'=>$amount, 'deliveryCharges'=>$deliveryCharges]);
    }
}
