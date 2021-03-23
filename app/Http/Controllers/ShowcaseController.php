<?php

namespace App\Http\Controllers;

use App\Models\Showcase;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Showcase $showcases)
    {
        $showcases = $showcases->orderBy('created_at', 'desc')->get();
        return view('showcases.index',compact('showcases'));
    }

    public function guests(Showcase $showcases)
    {
        $feature = $showcases->where('archive',false)->orderBy('created_at', 'desc')->first();
        $showcases = $showcases->where('archive',false)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('guests.showcases',compact('feature','showcases'));
    }

    public function search(Request $request)
    {
        $showcases = Showcase::search($request->get('search'))->get();
        return view('showcases.index',compact('showcases'));
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
        $showcase = Showcase::create($request->except('image'));
        if($request->has('image')){
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('showcases'), $imageName);

            $showcase->image = $imageName;
            
            $showcase->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function show($id,Showcase $showcases)
    {
        $feature = Showcase::findOrfail($id);
        $showcases = $showcases->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('showcases.show',compact('feature','showcases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Showcase $showcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Showcase $showcase)
    {
        $value = $showcase->archive == true ? false : true;

        $showcase->archive = $value;

        $showcase->save();

        return redirect('/showcases');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Showcase  $showcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Showcase $showcase)
    {
        $showcase->delete();
        return back();
    }
}
