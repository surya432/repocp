<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();   
        return view('layouts.product', ['Product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.productCreate');
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'keterangan' => 'required',
        ]);
        $product = new \App\Product;
        $product->nama = $request->input('nama');
        $product->deskripsi = $request->input('deskripsi');
        $product->keterangan = $request->input('keterangan');
        if ($request->hasFile('images')) {
            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
            $product->images = $imageName;
        }
        $product->save();
        return  redirect()->route('product.index')
            ->with('success','Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('layouts.productEdit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'keterangan' => 'required',
           
        ]);
       $product  = \App\Product::find($product->id);
       $product->nama = $request->input('nama');
       $product->deskripsi = $request->input('deskripsi');
       $product->keterangan = $request->input('keterangan');
        if ($request->hasFile('images')) {
            File::delete('images/'.$product->images);

            $imageName = time().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('images'), $imageName);
           $product->images = $imageName;
        }
        $product->save();
        return  redirect()->route('product.index')
            ->with('success','Berhasil Di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
          //
          $product->delete();
          return  redirect()->route('product.index')
              ->with('success','Berhasil Di Hapus');
    }
}