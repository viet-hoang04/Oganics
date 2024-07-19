<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function insertorder(request $request){
     $order_data=[
     'CustomerID'=> Auth::user()->id,
     'total'=>$request->total,
     'created_at' => now(),
     'updated_at' => now(),
     ];
     $order = OrderModel::create( $order_data);
     $OrderID = $order->OrderID;
     $cart = session()->get('cart', []);
     foreach ($cart as  $pro) {
      $orderDetail_data=[
       'OrderID'=>$OrderID,
       'ProductName'=> $pro['name'],
        'Quantity'=>$pro['quantity'],
        'UnitPrice'=>$pro['price'],
        'Subtotal'=>($pro['quantity']*$pro['price']),
      ];
      OrderDetailModel::create( $orderDetail_data);
     }
     $request->session()->put('cart',[]);

      return redirect()->route('home');
    }
    public function order(){
      $orders = OrderModel::all();
    return view('Order', compact('orders'));
    }

    public function list_order(){
      $orders = OrderModel::all();
      return view('back_end.order_list', compact('orders'));
    }
}
