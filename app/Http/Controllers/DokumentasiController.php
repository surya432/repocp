<?php

namespace App\Http\Controllers;

use App\Dokumentasi;
use Illuminate\Http\Request;
use File;

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
        $Dokumentasi  = Dokumentasi::all();
        return view('layouts.dokumentasi',compact('Dokumentasi'));
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
            'title' => 'required|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required',
        ]);
        $dokumentasi = new \App\Dokumentasi;
        $dokumentasi->title = $request->input('title');
        $dokumentasi->deskripsi = $request->input('deskripsi');
        $dokumentasi->content = $request->input('content');
        $dokumentasi->tanggal = $request->input('tanggal');        
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $dokumentasi->images = $imageName;
        }
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
        $dokumentasi = \App\Dokumentasi::with('imagesMedia')->find($dokumentasi->id);
        return view('layouts.dokumentasiEdit',compact('dokumentasi'));
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
            'title' => 'required|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required',
        ]);
        $dokumentasi2 =  \App\Dokumentasi::find($dokumentasi->id);
        $dokumentasi2->title = $request->input('title');
        $dokumentasi2->deskripsi = $request->input('deskripsi');
        $dokumentasi2->content = $request->input('content');
        $dokumentasi2->tanggal = $request->input('tanggal');
        if ($request->hasFile('images')) {
            File::delete('images/'.$dokumentasi->images);
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $dokumentasi2->images = $imageName;
        }
        
        $dokumentasi2->save();
        if ($request->hasFile('filename')) {
            \App\Media::where('dokumentasi_id',$dokumentasi->id)->delete();
            foreach ($request->filename as $file) {
                $name = md5(now()) . $file->getClientOriginalName();
                $upload_success = $file->move(public_path('images'), $name);
                try {
                    $mime = $file->getMimeType();
                } catch (\Exception $e) {
                    $mime = $file->getClientMimeType();
                }
                \App\Media::create(["title" =>  $name, "path" => "$name", "mime" =>  $mime, "dokumentasi_id" => $dokumentasi2->id]);
            }
        }
        
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