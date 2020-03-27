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
        $validatedData = $request->validate([
            'nama' => 'required|unique:perijinans|max:255',
            'kepanjangan' => 'required|unique:perijinans',
            'nomor' => 'required',
        ]);
        $perijinan = new \App\Perijinan;
        $perijinan->nama = $request->input('nama');
        $perijinan->kepanjangan = $request->input('kepanjangan');
        $perijinan->nomor = $request->input('nomor');
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $perijinan->images = $imageName;
        }
        $perijinan->save();
        return  redirect()->route('perijinan.index')
            ->with('success','Berhasil Di Simpan');
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
        // dd($perijinan);
        return view('layouts.perijinanEdit',compact('perijinan'));
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'kepanjangan' => 'required',
            'nomor' => 'required',
        ]);
        $perijinan = \App\Perijinan::find($perijinan->id);
        $perijinan->nama = $request->input('nama');
        $perijinan->kepanjangan = $request->input('kepanjangan');
        $perijinan->nomor = $request->input('nomor');
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $perijinan->images = $imageName;
        }
        $perijinan->save();
        return  redirect()->route('perijinan.index')
            ->with('success','Berhasil Di Simpan');
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
        $perijinan->delete();
        return  redirect()->route('perijinan.index')
            ->with('success','Berhasil Di Hapus');
    }
}