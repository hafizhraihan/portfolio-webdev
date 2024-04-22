<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    function __construct()
    {
        $this->_type = 'experience';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = profile::where('type', $this->_type)->orderBy('end_date', 'desc')->get();
        // $data = profile::where('type', 'experience')->orderBy('end_date', 'desc');
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('desc', $request->desc);
        Session::flash('info1', $request->info1);
        Session::flash('start_date', $request->start_date);
        Session::flash('end_date', $request->end_date);

        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Title is required.',
                'info1.required' => 'Company name is required.',
                'start_date.required' => 'Start date is required.',
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type'=> $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'desc' => $request->desc,
        ];

        profile::create($data);

        return redirect()->route('experience.index')->with('success', 'New experience added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = profile::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.experience.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'start_date' => 'required',
            ],
            [
                'title.required' => 'Title is required.',
                'info1.required' => 'Company name is required.',
                'start_date.required' => 'Start date is required.',
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type'=> $this->_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'desc' => $request->desc,
        ];

        profile::where('id', $id)->update($data);

        return redirect()->route('experience.index')->with('success', 'Data updated.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        profile::where('id',$id)->where('type', $this->_type)->delete();
        return redirect()->route('experience.index')->with('success', 'Experience deleted.');
    }
}
