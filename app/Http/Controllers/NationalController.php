<?php

namespace App\Http\Controllers;

use App\Models\National;
use Illuminate\Http\Request;

class NationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(National $nationals)
    {
        $nationals = $nationals->all();
        return view('endorsers.nationals',compact('nationals'));
    }

    public function guests(National $nationals)
    {
        $nationals = $nationals->orderBy('lname', 'asc')->get();
        return view('guests.nationals',compact('nationals'));
    }

    /**
     * Show the form for searching national endorsers.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $nationals = National::search($request->get('search'))->get();
        return view('endorsers.nationals',compact('nationals'));
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
        $national = National::create($request->except('image'));
        if($request->has('image')){
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('national'), $imageName);

            $national->image = $imageName;
            
            $national->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\National  $national
     * @return \Illuminate\Http\Response
     */
    public function show(National $national)
    {
        return view('nationals.show',compact('national'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\National  $national
     * @return \Illuminate\Http\Response
     */
    public function edit(National $national)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\National  $national
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, National $national)
    {
        $national->fill($request->except('image'));
        $national->save();

        if($request->has('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('national'), $imageName);

            $national->image = $imageName;

            $national->save();
        }
        
        return redirect('/nationals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\National  $national
     * @return \Illuminate\Http\Response
     */
    public function destroy(National $national)
    {
        $national->delete();
        return back();
    }
}
