<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    function index(){
        $Setting = \App\General::all();
        $perijinan  = \App\Perijinan::take(6)->orderBy('created_at','desc')->get();
        $mitra  = \App\Mitra::take(6)->orderBy('created_at','desc')->get();
        $product  = \App\Product::take(6)->orderBy('nama','asc')->get();
        $about  = \App\About::where('flag','active')->take(6)->get();
        $dokumentasi  = \App\Dokumentasi::with('imagesMedia')->take(6)->orderBy('created_at','desc')->get();
        // dd($dokumentasi);
        return view("welcome",compact('Setting','perijinan','mitra','product','about','dokumentasi'));
    }
    public static function getMeta($name,$data){
        $databack = "";
        foreach($data as $a=>$b){
            if($b['key'] == $name){
                $databack = $b['value'];
            }
        }
        return $databack;
    }
    function setting(Request $request){
        return view('layouts.setting');
    }
    function modalDokumentasi(Request $request, $id){
        $b =   \App\Dokumentasi::where('id',$id)->with('imagesMedia')->first();
       return view('modalDokumentasi',compact('b'));
    }
}
