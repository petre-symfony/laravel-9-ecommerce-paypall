<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $products = Product::all();
        $categories = Category::all();
        return view('front.home');
    }

    public function shop() {
        $products = Product::all();
        $categories = Category::all();
        return view('front.shop', compact(['categories','products']));
    }

    public function contact() {
        return view('front.contact');
    }

    public function product_details($id) {
        $products = Product::find($id);

        return view('front.product_details', compact('products'));
    }
}
