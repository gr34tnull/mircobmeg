<?php

namespace App\Http\Controllers;

use App\Models\National;
use App\Models\NationalVideo;
use Illuminate\Http\Request;

class NationalVideoController extends Controller
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

        NationalVideo::create([
            'national_id' => $request->national_id,
            'title' => $request->title,
            'video' => $videoName,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $national = National::findOrFail($id);
        $videos = NationalVideo::where('national_id', $national->id)->get();
        return view('videos.nationals',compact('videos','national'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalVideo $nationalVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalVideo $nationalVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalVideo  $nationalVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NationalVideo::findOrFail($id)->destroy($id);
        return back();
    }
}
