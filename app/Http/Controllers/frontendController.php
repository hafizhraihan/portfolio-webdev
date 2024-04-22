<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\portfolio;
use App\Models\profile;
use App\Models\projects;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $about_id = get_meta_value('_about');
        $about_data = pages::where('id',$about_id)->first();
        
        $experience_data = profile::where('type','experience')->get();

        $education_data = profile::where('type','education')->get();

        $project_data = portfolio::where('type','project')->get();

        $interest_id = get_meta_value('_interest');
        $interest_data = pages::where('id',$interest_id)->first();

        $certification_id = get_meta_value('_certification');
        $certification_data = pages::where('id',$certification_id)->first();

        $award_id = get_meta_value('_award');
        $award_data = pages::where('id',$award_id)->first();

        
        return view('frontend.index')->with([
            'about' => $about_data,
            'experience' => $experience_data,
            'interest' => $interest_data,
            'education' => $education_data,
            'project' => $project_data,
        ]);
    }
}
