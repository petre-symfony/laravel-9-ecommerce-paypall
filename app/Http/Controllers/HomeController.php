<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recommends;

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
        if(Auth::check()){
            $recommend = new Recommends();
            $recommend->uid = Auth::user()->id;
            $recommend->pro_id = $id;
            $recommend->save();
        }
        $products = DB::table('products')->where('id', $id)->get();

        return view('front.product_details', compact('products'));
    }

    public function wishlist(Request $request){
        $wishlist = new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->pro_id = $request->pro_id;

        $wishlist->save();

        $products = DB::table('products')->where('id', $request->pro_id)->get();

        return view('front.product_details', compact('products'));
    }

    public function view_wishlist(){
        $products = DB::table('wishlist')
            ->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')
            ->get();

        return view('front.wishlist', compact('products'));
    }

    public function remove_wishlist($id){
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();

        return back()->with('msg', 'Item Removed from Wishlist');
    }
}
