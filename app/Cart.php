<?php
namespace App;
class Cart {
    public $products = null;
    public $totalPrice = 0;
    public $totalQuality = 0;

    public function __construct($cart) {
        if($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuality = $cart->totalQuality;
        }
    }

    public function AddCart($product, $id) {
        $newProduct = ['quanlity' => 0, 'price' => $product->unit_price, 'productInfo' => $product];
        if($this->products) {
            if(array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanlity']++;
        $newProduct['price'] = $newProduct['quanlity'] * $product->unit_price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->unit_price;
        $this->totalQuality++;
    }

    public function DeleteItemCart($id) {
        $this->totalQuality -= $this->products[$id]['quanlity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}

?>
