<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Validator;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data
        $data['pages'] = Pages::paginate(10);
        return view('pages.pages', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
            'section' => $request->section,
        ];
        // Get the uploaded file
        $image = $request->file('images');
        if ($image) {
            // Generate a unique filename for the image
            $filename = time() . '-' . $image->getClientOriginalName();

            // Move the uploaded file to a public storage directory
            $path = $image->storeAs('public/pages', $filename);
            $data['images'] = $path;
        }
        Pages::create($data);
        return redirect('page');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pages::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Pages::find($id);
        return view('pages.edit', $data);
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
        //
        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'images' => 'required|image',
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            dd($res);
        } else {
            $post = Pages::findOrFail($id);
            $post->title = $request->title;
            $post->desc = $request->desc;

            $file = $request->file('images');
            // cek file
            if ($file) {

                $filePath = public_path('pages/' . $post->images);
                if (file_exists($filePath))  unlink($filePath);

                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move('pages', $filename);
                $post->images = $filename;
            }
            $post->save();
        }

        return redirect('page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Pages::findOrFail($id);
        $post->delete();
        return redirect('page');
    }
}
