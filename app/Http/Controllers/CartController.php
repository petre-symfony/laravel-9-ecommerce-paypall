<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller{
    public function index() {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    public function addItem(Request $request, $id) {
        $product = Product::find($id);

        if(isset($request->newPrice)){
            $price = $request->newPrice; //if size selected
        } else {
            $price = $request->pro_price; //default price
        }
        Cart::add($id, $product->pro_name, 1, $price, [
            'img' => $product->image,
            'stock' => $product->stock
        ]);
        return back();
    }

    public function destroy($id) {
        Cart::remove($id);
        // echo $id;
        return back();
    }

    public function update(Request $request, $id) {
        $qty = $request->qty;
        $proId = $request->proId;

        $rowId = $request->rowId; //for update
        Cart::update($rowId, $qty);
        $cartItems = Cart::content(); //for display new data of cart

        return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
        /*
        $product = Product::find($proId);
        $stock = $product->stock;

        if ($qty < $stock){
            $msg = 'Cart is updated';
            Cart::update($id, $request->qty);
            return back()->with('status', $msg);
        } else {
            $msg = 'Please, check your quantity is more than product stock';
        }
        Cart::update($id, $request->qty);
        return back()->with('error', $msg);
        */
    }
}
