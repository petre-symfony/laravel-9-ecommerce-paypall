<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller{
    public function index() {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    public function addItem($id) {
        echo $id;
        $product = Product::find($id);
        Cart::add($id, $product->pro_name, 1, $product->pro_price);
    }
}
