<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('front.home');
    }

    public function shop() {
        $products = Product::all();
        return view('front.shop', compact('products'));
    }

    public function contact() {
        return view('front.contact');
    }
}
