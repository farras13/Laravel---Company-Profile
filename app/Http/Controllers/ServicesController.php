<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Validator;

class ServicesController extends Controller
{
    public function index()
    {
        //get all data
        $data['service'] = Services::paginate(10);
        return view('services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
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
        ];
        // Get the uploaded file
        $file = $request->file('images');
        if ($file) {
            // Generate a unique filename for the image
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move('service', $filename);
            $data['images'] = $filename;
        }
        Services::create($data);
        return  redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Services::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Services::find($id);
        return view('services.edit', $data);
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
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            dd($res);
        } else {
            $post = Services::findOrFail($id);
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

        return  redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Services::findOrFail($id);
        $post->delete();
        return  redirect('services');
    }
}
