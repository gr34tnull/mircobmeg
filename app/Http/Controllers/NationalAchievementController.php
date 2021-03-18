<?php

namespace App\Http\Controllers;

use App\Models\NationalAchievement;
use Illuminate\Http\Request;

class NationalAchievementController extends Controller
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
        NationalAchievement::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NationalAchievement  $nationalAchievement
     * @return \Illuminate\Http\Response
     */
    public function show(NationalAchievement $nationalAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NationalAchievement  $nationalAchievement
     * @return \Illuminate\Http\Response
     */
    public function edit(NationalAchievement $nationalAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NationalAchievement  $nationalAchievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NationalAchievement $nationalAchievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NationalAchievement  $nationalAchievement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NationalAchievement::findOrFail($id)->destroy($id);
        return back();
    }
}
