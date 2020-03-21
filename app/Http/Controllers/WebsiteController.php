<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    function index(){
        $Setting = \App\General::all();
        return view("welcome",compact('Setting'));
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
