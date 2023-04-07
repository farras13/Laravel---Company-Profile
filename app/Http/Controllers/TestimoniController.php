<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Validator;

class TestimoniController extends Controller
{
    public function index()
    {
        //get all data
        $data['porto'] = Testimoni::paginate(10);
        return view('testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('testimoni.create');
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
            'name' => $request->name,
            'job' => $request->job,
            'desc' => $request->desc,
        ];
        // Get the uploaded file
        $file = $request->file('images');
        if ($file) {
            // Generate a unique filename for the image
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move('testi', $filename);
            $data['images'] = $filename;
        }
        Testimoni::create($data);
        return  redirect()->route('testi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Testimoni::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Testimoni::find($id);
        return view('testimoni.edit', $data);
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
            'name' => 'required',
            'job' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            dd($res);
        } else {
            $post = Testimoni::findOrFail($id);
            $post->name = $request->name;
            $post->job = $request->job;
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

        return  redirect()->route('testi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Testimoni::findOrFail($id);
        $post->delete();
        return  redirect()->route('testi');
    }
}
