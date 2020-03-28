<?php

namespace App\Http\Controllers;

use App\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //    
        $mitra = Mitra::all();   
        return view('layouts.mitra', ['Mitra' => $mitra]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.mitraCreate');
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
        $validator = $request->validate([
            'nama' => 'required|unique:perijinans|max:255',
            'images' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
       
        $mitra = new \App\Mitra;
        $mitra->nama = $request->input('nama');
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $mitra->images = $imageName;
        }
        $mitra->save();
        return  redirect()->route('mitra.index')
            ->with('success','Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        //
        return view('layouts.mitraEdit',compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required|unique:perijinans|max:255',
           
        ]);
        $mitra = \App\Mitra::find($mitra->id);
        $mitra->nama = $request->input('nama');
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $mitra->images = $imageName;
        }
        $mitra->save();
        return  redirect()->route('mitra.index')
            ->with('success','Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        //
        $mitra->delete();
        return  redirect()->route('mitra.index')
            ->with('success','Mitra Behasil Di Hapus');
    }
}