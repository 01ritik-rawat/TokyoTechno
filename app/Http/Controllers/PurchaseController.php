<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ConsumerLookup;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;


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

        $taxLookups=ConsumerLookup::where('lookup_key','TAX')->first('lookup_value');
        $taxCharges=json_decode($taxLookups->lookup_value);


        return view('orderNow',['products'=>$data, 'amount'=>$amount, 'deliveryCharges'=>$deliveryCharges, 'tax'=>$taxCharges]);
    }

    public function placeOrder(Request $request){

        $orderData=json_decode($request->orderData);
        $order=new Order;
        $order->user_id=Session::get('user')->id;
        $order->address=$request->address;
        $order->phone=$request->phone;
        $order->email=$request->email;
        // return $request;

        $order->sub_total=$request->subTotal;
        $order->tax_rate=$request->taxRate;
        $order->total_tax=$request->totalTax;
        $order->delivery_charges=$request->deliveryCharges;


        // $order->alt_phone=$request->address;
        $order->total_amount=$orderData->grandTotal;
        $order->payment_method=$request->paymentMethod;
        $order->payment_status='not_initialized';

        $subTotal=0;

        $orderSave=$order->save();
        if(!$orderSave){
            return ['message'=>'order not placed', 'orderData'=>$request];
        }

        foreach($orderData->products as $orderItem){
            $orderItemTable = new OrderItem;            
            $orderItemTable->quantity=$orderItem->count;
            $orderItemTable->product_name=$orderItem->product->name;
            $orderItemTable->product_id=$orderItem->product->id;
            $orderItemTable->order_id=$order->id;
            $orderItemTable->save();

            $subTotal=$subTotal+ ($orderItem->count * $orderItem->product->price);



        }
        if(!$orderItemTable){
            return ['message'=>'order item not placed', 'orderData'=>$request];
        }
        return view('invoice', [
            'order' => $order,
            'orderData' => $orderData->products,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'subTotal' => $subTotal,
            'grandTotal' => $request->grandTotal,
            'taxRate'=>$request->taxRate,
            'totalTax'=>$request->totalTax,
            'deliveryCharges'=>$request->deliveryCharges
        ]);



        


        
    }

    public function getAllOrders(){
        $userId=Session::get('user')->id;
        
        $orders= User::find($userId)->orders()->orderBy('created_at', 'desc')->limit(10)->get();
        return view('myOrders',['orders'=>$orders]);
    }

    public function getOrderById(Request $request){

        $orderId= $request->id;
        $userId=Session::get('user')->id;
        $orderDetails=user::find($userId)->orders()->where('id',$orderId)->first();

        // if(empty($orderDetails)){
        //     return ['message'=>'check the order id','userId'=>$userId];
        // }
        $orderItems=Order::find($orderId)->orderItems()->with('products')->get();       
        $data=['data'=>$orderItems, 'orderDetails'=>$orderDetails];

        return view('orderDetails',$data);


    }
}
