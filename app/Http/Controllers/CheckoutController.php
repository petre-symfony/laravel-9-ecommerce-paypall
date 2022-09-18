<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller {
    public function index() {
        if (Auth::check()) {
            return view('front.checkout');
        }

        return redirect('home');
    }

    public function checkoutValidate(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:35',
            'country' => 'required'
        ]);
        dd($request->all());
    }
}
