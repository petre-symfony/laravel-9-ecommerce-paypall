<?php

namespace App\Http\Controllers;

class CartController extends Controller{
    public function index() {
        return view('cart.index');
    }

    public function addItem($id) {
        echo $id;
    }
}
