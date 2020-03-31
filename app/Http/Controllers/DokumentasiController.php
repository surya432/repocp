<?php

namespace App\Http\Controllers;

use App\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumentasi = Dokumentasi::all();
        return view('layouts.dokumentasi',['Dokumentasi' => $dokumentasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.dokumentasiCreate');
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
        $validatedData = $request->validate([
            'title' => 'required|unique:dokumentasis|max:255',
            'diskripsi' => 'required|unique:dokumentasis',
            'tanggal' => 'required',
        ]);
        $dokumentasi = new \App\Dokumentasi;
        $dokumentasi->title = $request->input('title');
        $dokumentasi->diskrpsi = $request->input('diskripsi');
        $dokumentasi->tanggal = $request->input('tanggal');
       
        
        $dokumentasi->save();
        return  redirect()->route('dokumentasi.index')
            ->with('success','Berhasil Di Simpan');
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        //
        return view('layouts.dokumentasiEdit',compact('dokumentai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        //
         //
         $validatedData = $request->validate([
            'title' => 'required|unique:dokumentasis|max:255',
            'diskripsi' => 'required|unique:dokumentasis',
            'tanggal' => 'required',
        ]);
        $dokumentasi = new \App\Dokumentasi;
        $dokumentasi->title = $request->input('title');
        $dokumentasi->diskrpsi = $request->input('diskripsi');
        $dokumentasi->tanggal = $request->input('tanggal');
       
        
        $dokumentasi->save();
        return  redirect()->route('dokumentasi.index')
            ->with('success','Berhasil Di Simpan');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        // 
          $dokumentasi->delete();
        return  redirect()->route('dokumentasi.index')
        ->with('success','Berhasil Di Hapus');
    }
}
