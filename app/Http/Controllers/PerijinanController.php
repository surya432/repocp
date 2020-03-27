<?php

namespace App\Http\Controllers;

use App\Perijinan;
use Illuminate\Http\Request;

class PerijinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perijinan = Perijinan::all();   
        return view('layouts.perijinan', ['Perijinan' => $perijinan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.perijinanCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function show(Perijinan $perijinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perijinan $perijinan)
    {
        //
        return view('layouts.perijinanEdit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perijinan $perijinan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perijinan  $perijinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perijinan $perijinan)
    {
        //
    }
}
