<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Validator;

class PortofolioController extends Controller
{
    public function index()
    {
        //get all data
        $data['porto'] = Portofolio::paginate(10);
        return view('portofolio.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('portofolio.create');
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
            'tags' => $request->tags,
            'desc' => $request->desc,
        ];
        // Get the uploaded file
        $file = $request->file('images');
        if ($file) {
            // Generate a unique filename for the image
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move('portofolio', $filename);
            $data['images'] = $filename;
        }
        Portofolio::create($data);
        return  redirect('portofolios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Portofolio::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Portofolio::find($id);
        return view('portofolio.edit', $data);
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
            'tags' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            dd($res);
        } else {
            $post = Portofolio::findOrFail($id);
            $post->title = $request->title;
            $post->tags = $request->tags;
            $post->desc = $request->desc;

            $file = $request->file('images');
            // cek file
            if ($file) {

                $filePath = public_path('portofolio/' . $post->images);
                if (file_exists($filePath))  unlink($filePath);

                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move('portofolio', $filename);
                $post->images = $filename;
            }
            $post->save();
        }

        return  redirect('portofolios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Portofolio::findOrFail($id);
        $post->delete();
        return  redirect('portofolios');
    }
}
