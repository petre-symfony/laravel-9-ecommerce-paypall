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

    public function password() {
        return view('profile.updatePassword');
    }

    public function updatePassword() {
        return view('profile.updatePassword');
    }

    public function address() {
        $user_id = Auth()->user()->id;
        $address_data = DB::table('address')
            ->where('user_id', '=', $user_id)
            ->orderBy('id', 'DESC')
            ->get()
        ;
        return view('profile.address', compact('address_data'));
    }

    public function updateAddress(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:2|max:25',
            'state' => 'required|min:5|max:35',
            'country' => 'required'
        ]);

        $user_id = Auth()->user()->id;
        DB::table('address')
            ->where('user_id', '=', $user_id)
            ->update($request->except('_token'))
        ;
        return back()->with('msg', 'Your address has been updated');
    }
}
