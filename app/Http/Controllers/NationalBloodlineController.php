<?php

namespace App\Http\Controllers;

use App\Models\National;
use App\Models\NationalBloodline;
use App\Models\NationalImage;
use Illuminate\Http\Request;

class NationalBloodlineController extends Controller
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
        $i = 0;
        $bloodline = NationalBloodline::create($request->except('file'));

        foreach($request->file('file') as $image)
        {
            $imageName = $bloodline->id.'_'.time().'_'.$i++.'.'.$image->extension();  
        
            $image->move(public_path('bloodlines'), $imageName);

            $fileNames[] = $imageName;
        }

        foreach($fileNames as $image)
        {
            NationalImage::create([
                'bloodline_id' => $bloodline->id,
                'image' => $image,
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalBloodline  $nationalBloodline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $national = National::findOrFail($id);
        $images = NationalImage::all();
        $bloodlines = NationalBloodline::where('national_id', $national->id)->get();
        return view('bloodlines.show',compact('bloodlines','national','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalBloodline  $nationalBloodline
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalBloodline $nationalBloodline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalBloodline  $nationalBloodline
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $i = 0;
        $bloodline = NationalBloodline::findOrFail($id);

        $bloodline->fill($request->except('file'));
        $bloodline->save();

        foreach($request->file('file') as $image)
        {
            $imageName = $bloodline->id.'_'.time().'_'.$i++.'.'.$image->extension();  
        
            $image->move(public_path('bloodlines'), $imageName);

            $fileNames[] = $imageName;
        }

        foreach($fileNames as $image)
        {
            NationalImage::create([
                'bloodline_id' => $bloodline->id,
                'image' => $image,
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalBloodline  $nationalBloodline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NationalBloodline::findOrFail($id)->destroy($id);
        return back();
    }
}
