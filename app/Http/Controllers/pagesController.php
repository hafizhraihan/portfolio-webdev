<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pages::orderBy('title', 'asc')->get();
        return view('dashboard.pages.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
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

        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
            ],
            [
                'title.required' => 'Title is required.',
                'desc.required' => 'Decsription is required.',
            ]
        );

        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
        ];

        pages::create($data);

        return redirect()->route('pages.index')->with('success', 'Successfully added.');
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
        $data = pages::where('id', $id)->first();
        return view('dashboard.pages.edit')->with('data', $data);
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
                'desc' => 'required',
            ],
            [
                'title.required' => 'Title is required.',
                'desc.required' => 'Decsription is required.',
            ]
        );

        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
        ];

        pages::where('id', $id)->update($data);

        return redirect()->route('pages.index')->with('success', 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pages::where('id',$id)->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted.');
    }
}
