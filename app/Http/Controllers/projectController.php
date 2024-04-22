<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use App\Models\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class projectController extends Controller
{
    function __construct()
    {
        $this->type = 'project';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = portfolio::all();
        return view('dashboard.project.index', compact('data'));

        // $data = portfolio::where('type', 'project')->orderBy('id', 'asc')->get();
        // return view('dashboard.project.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'desc' => 'required',
                'img' => 'mimes:jpeg,jpg,png,gif',
                'info1' => 'required',
            ],
            [
                'title.required' => 'Project name is required.',
                'desc.required' => 'Decsription is required.',
                'info1.required' => 'Project link is required',
                'img.mimes' => 'Invalid file. Please choose files with extensions: .jpeg, .jpg, .png, .gif',
            ]
        );

        if($request->has('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'img/';
            $file->move($path, $filename);
        }

        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
            'type' => 'project',
            'img'=> $path.$filename,
            'info1' => $request->info1,
        ];

        portfolio::create($data);

        return redirect()->route('project.index')->with('success', 'Successfully added.');
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
        //
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
                'img' => 'mimes:jpeg,jpg,png,gif',
                'info1' => 'required',
            ],
            [
                'title.required' => 'Project name is required.',
                'desc.required' => 'Decsription is required.',
                'info1.required' => 'Project link is required',
                'img.mimes' => 'Invalid file. Please choose files with extensions: .jpeg, .jpg, .png, .gif',
            ]
        );

        $project = portfolio::findOrFail($id);

        if($request->has('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'img';
            $file->move($path, $filename);

            if(File::exists($project->img)){
                
            }
        }

        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
            'type' => 'project',
            'img' => $path.$filename,
        ];

        $project->update($data);

        return redirect() -> route('project.index')->with('success', 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        portfolio::where('id',$id)->where('type', $this->type)->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted.');
    }
}
