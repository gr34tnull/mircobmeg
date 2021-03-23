<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVideo;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $products)
    {
        $products = $products->all();
        return view('products.index',compact('products'));
    }

    public function guests(product $products)
    {
        $products = $products->get();
        return view('guests.products',compact('products'));
    }

    public function search(Request $request)
    {
        $products = Product::search($request->get('search'))->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->except('image'));
        if($request->has('image')){
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('products'), $imageName);

            $product->image = $imageName;

            $product->save();
            
        }
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $videos = ProductVideo::where('product_id', $product->id)->get();
        $comments = ProductComment::where('product_id', $product->id)->get();
        return view('products.show',compact('product','videos','comments'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->get();
        return view('products.list', compact('category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->except('image'));
        $product->save();

        if($request->has('image')){ 

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
         
            $imageName = time().'.'.$request->image->extension(); 

            $request->image->move(public_path('products'), $imageName);

            $product->image = $imageName;

            $product->save();

        }
        
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
