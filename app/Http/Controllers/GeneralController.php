<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $general = General::all();   
        return view('layouts.setting', ['General' => $general]);
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
     * Store a newly eated resource in storage.
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
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        //
        return view('layouts.settingEdit',compact('general'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, General $general)
    {
        //
        $validatedData = $request->validate([
            'id' => 'required',
            'key' => 'required',
            'value' => 'required',
            'flag' => 'required',
        ]);
        $general = \App\General::find($general->id);
        $general->id = $request->input('id');
        $general->key = $request->input('key');
        $general->value = $request->input('value');
        $general->value = $request->input('flag');
      
      
        $general->save();
        return  redirect()->route('general.index')
            ->with('success','Berhasil Di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        //
    }
}
