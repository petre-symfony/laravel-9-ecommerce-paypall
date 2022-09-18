<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders_Products;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller {
    public function index() {
        return view('profile.index');
    }

    public function orders() {
        $user_id = Auth()->user()->id;
        //$orders = Orders_Products::all();
        $orders = DB::table('order_product')
            ->leftJoin(
                'products',
                'products.id',
                '=',
                'order_product.product_id'
            )
            ->leftJoin(
                'orders',
                'orders.id',
                '=',
                'order_product.order_id'
            )
            ->where('orders.user_id', '=', $user_id)
            ->get()
        ;

        return view('profile.orders', compact('orders'));
    }
}
