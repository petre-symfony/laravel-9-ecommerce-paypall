<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductProperty;

class ProductsController extends Controller {
    public function index() {
        $products = DB::table('categories')
            ->rightJoin('products', 'products.category_id', '=', 'categories.id')
            ->get();

        //now we are fetching all products and categories
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request) {
        $formInput = $request->except('image');

        $this->validate($request, [
            'pro_name' => 'required',
            'pro_code' => 'required',
            'pro_price' => 'required',
            'pro_info' => 'required',
            'spl_price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $image=$request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        $categories = Category::all();
        Product::create($formInput);
        return redirect()->back();
    }

    public function show($id) {
       $product = Product::find($id);
       return view('product.show', compact($product));
    }

    public function update(Request $request){
        $products = DB::table('products')->where('id', '=', $request->id)->get();

        $pro_id = $request->id;
        $pro_name = $request->pro_name;
        $category_id = $request->category_id;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;

        DB::table('products')->where('id', $pro_id)->update([
            'pro_name' => $pro_name,
            'category_id' => $category_id,
            'pro_code' => $pro_code,
            'pro_price' => $pro_price,
            'pro_info' => $pro_info,
            'spl_price' => $spl_price
        ]);

        return view('admin.product.index', compact('products'));
    }

    public function ProductEditForm($id){
        $products = Product::find($id);
        $categories = Category::all();
        $prots = ProductProperty::all();

        return view('admin.product.editProducts', compact('products', 'categories', 'prots'));
    }

    public function imageEditForm($id) {
        $product = Product::find($id);

        return view('admin.product.ImageEditForm', compact('product'));
    }

    public function updateImageProduct(Request $request){
        $pro_id = $request->id;
        $image = $request->image;

        if($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
            DB::table('products')->where('id', $pro_id)->update(['image' => $imageName]);
        }



        return redirect()->back();
    }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()->back();
    }

    public function addProperty($id){
        $products = Product::find($id);

        return view('admin.product.addProperty', compact('products'));
    }

    public function submitProperty(Request $request){
        $properties = new ProductProperty();
        $properties->pro_id = $request->pro_id;
        $properties->size = $request->size;
        $properties->color = $request->color;
        $properties->pro_price = $request->p_price;
        $properties->save();

        return redirect()->back();
    }

    public function editProperty(Request $request){
        $uptProts = DB::table('product_property')
            ->where('pro_id', $request->pro_id)
            ->where('id', $request->id)
            ->update($request->except('_token'));
        if($uptProts){
            return back()->with('msg', 'updated');
        }else {
            return back()->with('msg', 'check value again');
        }
    }
}
