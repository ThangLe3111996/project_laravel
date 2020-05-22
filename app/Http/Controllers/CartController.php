<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as AppProducts;
use App\Cart;

class CartController extends Controller
{

    public function getAddCart(Request $req, $id) {
        $product = AppProducts::where('id', $id)->first();
        if($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $req->Session()->put('Cart',$newCart);
        }
        return view('frontend.cart');
    }

    public function getDeleteItem(Request $req, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else{
            $req->Session()->forget('Cart');
        }
        return view('frontend.cart');
    }

    public function getListCart() {
        return view('cartlist');
    }

    public function getDeleteListCart(Request $req, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else{
            $req->Session()->forget('Cart');
        }
        return view('frontend.delete-cartlist');
    }
}
