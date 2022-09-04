<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    public function index() {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        return view('admin.product.create');
    }

    public function store(Request $request) {
        $formInput = $request->except('image');

        $this->validate($request, [
            'pro_name' => 'required',
            'pro_code' => 'required',
            'pro_price' => 'required',
            'pro_info' => 'required',
            'spl_price' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $image=$request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);
        return redirect()->back();
    }

    public function show($id) {
       $product = Product::findOrFail($id);
       return view('product.show', compact($product));
    }
}
