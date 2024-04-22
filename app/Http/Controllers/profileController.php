<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index(){
        return view('dashboard.profile.index');
    }

    function update(Request $request){
        $request->validate([
            '_profpic' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email',
            '_loc' => 'required',
        ], [
            '_profpic.mimes' => 'Invalid file. Please use files with .jpg, .jpeg, .png, .gif extensions only.',
            '_email.required' => 'Email is required',
            '_email.email' => 'Invalid email',
            '_loc.required' => 'Location is required',
        ]);

        if($request->hasFile('_profpic')){
            $profpic_file = $request->file('_profpic');
            $profpic_extension = $profpic_file->extension();
            $profpic_new = date('ymdhis').".$profpic_extension";
            $profpic_file->move(public_path('profpic'), $profpic_new);

            // If update profile picture
            $profpic_old = get_meta_value('_profpic');
            File::delete(public_path('profpic')."/".$profpic_old);

            metadata::updateOrCreate(['meta_key'=>'_profpic'], ['meta_value'=> $profpic_new]);
        }

        metadata::updateOrCreate(['meta_key'=>'_email'], ['meta_value'=> $request->_email]);
        metadata::updateOrCreate(['meta_key'=>'_loc'], ['meta_value'=> $request->_loc]);
        metadata::updateOrCreate(['meta_key'=>'_nohp'], ['meta_value'=> $request->_nohp]);

        metadata::updateOrCreate(['meta_key'=>'_linkedin'], ['meta_value'=> $request->_linkedin]);
        metadata::updateOrCreate(['meta_key'=>'_ig'], ['meta_value'=> $request->_ig]);
        metadata::updateOrCreate(['meta_key'=>'_github'], ['meta_value'=> $request->_github]);
        metadata::updateOrCreate(['meta_key'=>'_behance'], ['meta_value'=> $request->_behance]);

        return redirect()->route('profile.index')->with('success', 'Profile updated.');
    }
}
