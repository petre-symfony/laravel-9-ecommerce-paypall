<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {

    }

    public function store(Request $request){
        Category::create($request->all());
        return back();
    }

    public function show($id) {
        $products = Category::find($id)->products;
        $categories = Category::all();

        return view('admin.category.index', compact(['categories', 'products']));
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
