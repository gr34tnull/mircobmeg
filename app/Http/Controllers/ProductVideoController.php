<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVideo;
use Illuminate\Http\Request;

class ProductVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $videoName = time().'.'.$request->video->extension();
        $request->video->move(public_path('videos'), $videoName);

        ProductVideo::create([
            'product_id' => $request->product_id,
            'title' => $request->title,
            'video' => $videoName,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVideo  $productVideo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $videos = ProductVideo::where('product_id', $product->id)->get();
        return view('videos.products',compact('videos','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVideo  $productVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVideo $productVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVideo  $productVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVideo $productVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVideo  $productVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductVideo::findOrFail($id)->destroy($id);
        return back();
    }
}
