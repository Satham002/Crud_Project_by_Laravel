<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
// use Illuminate\View\View;
class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5);
        return view('Product.index', ['product'=>$products]);
    }
    public function create(){
        return view('Product.create');
    }
    public function store(Request $request){
        
        // dd($request);
        $request->validate([
            'name'=>'required',
            'mrp'=>'required|numeric',
            'Price'=>'required|numeric',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $image_name =md5(time()).".".$request->image->extension();
        $request->image->move(public_path('Product_pictures'), $image_name);
        $product = new Product();
        $product->image = $image_name;
        $product->name = $request->name;
        $product->mrp = $request->mrp;
        $product->Price = $request->Price;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('New Product added');
    }
    
    public function show($id){
        $product = Product::where('id' , $id)->first();
        return view('Product.show', ['product'=>$product]);
    }
    
    public function edit($id){
        $product = Product::where('id' , $id)->first();
        return view('Product.edit', ['product'=>$product]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'mrp'=>'required|numeric',
            'Price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        if(isset($request->image)){
            $image_name =md5(time()).".".$request->image->extension();
            $request->image->move(public_path('Product_pictures'), $image_name);
            $product->image = $image_name;
        }
        $product = Product::where('id' , $id)->first();
        $product->name = $request->name;
        $product->mrp = $request->mrp;
        $product->Price = $request->Price;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product Updated');
        // var_dump($request->name);
    }
    
    public function delete($id){
        $product = Product::where('id' , $id)->first();
        // var_dump($product);
        $product->delete();
        return back()->withSuccess('Product Deleted');
    }
}
