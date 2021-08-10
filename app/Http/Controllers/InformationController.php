<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use File;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::orderBy('id', 'DESC')->paginate(4);
        return view('welcome', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'unique:Information',
            'description' => 'required',
            'image' => 'required',
        ]);
        $document = $request->file('image');
        if(!empty($document)){
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/images',$document_name);
        }
        else{
            $document_name = $request->image;
        }
        Information::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'description'=>$request->description,
            'image'=>$document_name,
        ]);
        session()->flash('success', 'A new student has added successfully.');
        return redirect()->route('information.welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::find($id);
        return view('show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Information::find($id);
        return view('edit', compact('information'));
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
        $data = Information::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->description=$request->description;
        // inser images also
        if ($request -> hasFile('image')) {
            // delete the old image from folder
            if (File::exists('images/'.$data->image)) {
                file::delete('images/'.$data->image);
            }
            $document = $request->file('image');
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/images',$document_name);
            $data->image=$document_name;
        }
        $data->save();
        session()->flash('success', 'Student has updated successfully.');
        return redirect()->route('information.welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::find($id);
        if (!is_null($information)) {
            // Delete image
            if (File::exists('images/'.$information->image)) {
                File::delete('images/'.$information->image);
            }
            $information->delete();
        }
        session()->flash('success', 'Student has deleted successfully !!');
        return back();
    }
    /**
     * Search the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;

        $information = Information::orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->paginate(4);

        return view('search', compact('search', 'information'));
    }
}
