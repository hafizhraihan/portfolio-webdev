<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use App\Models\pages;
use Illuminate\Http\Request;

class pagecontrolController extends Controller
{
    function index(){
        $datapage = pages::orderBy('title', 'asc')->get();
        return view("dashboard.pagecontrol.index")->with('datapage', $datapage);
    }

    function update(Request $request){
        metadata::updateOrCreate(['meta_key' => '_about'], ['meta_value' => $request->_about]);
        metadata::updateOrCreate(['meta_key' => '_interest'], ['meta_value' => $request->_interest]);
        metadata::updateOrCreate(['meta_key' => '_awards'], ['meta_value' => $request->_awards]);
        metadata::updateOrCreate(['meta_key' => '_certification'], ['meta_value' => $request->_certification]);

        return redirect()->route('pagecontrol.index')->with('success', 'Pages Updated.');
    }
}
