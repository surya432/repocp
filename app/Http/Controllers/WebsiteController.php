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
        $product  = \App\Product::take(3)->orderBy('nama','asc')->get();
        $about  = \App\About::where('flag','active')->take(4)->get();
        return view("welcome",compact('Setting','perijinan','mitra','product','about'));
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
}
