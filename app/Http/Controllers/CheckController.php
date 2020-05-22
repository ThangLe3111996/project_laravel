<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer as AppCustomer;
use App\Orders as AppBill;
use App\Cart;
use Illuminate\Support\Facades\Session;

class CheckController extends Controller
{
    public function postCheckout(Request $checkout) {
        $cart = Session::get('Cart');
        $this->validate($checkout,
        [
            'name'=>'required|min:2|bail',
            'phone'=>'required|min:9',
            'address'=>'required'
        ],
        [
            'name.required'=>'Please enter your name',
            'phone.required'=>'Please enter your phone',
            'phone.min'=>'Please enter the correct phone number format',
            'address.required'=>'Please enter your address'
        ]);
        $customer = new AppCustomer();
        $customer->id = $checkout->id;
        $customer->name = $checkout->name;
        $customer->phone = $checkout->phone;
        $customer->address = $checkout->address;
        $customer->save();

        $order = new AppBill();
        $order->customer_id = $customer->id;
        $order->total_quality = $cart->totalQuality;
        $order->total_price = $cart->totalPrice;
        $order->save();

        return redirect()->back()->with('Success','Buy success');
    }
    public function getCheckout() {
        $arr = ['name','phone','address'];
        return view('checkout',compact('arr'));
    }
}
