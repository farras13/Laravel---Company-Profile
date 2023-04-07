<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['fitur'] = Fitur::all();
        return view('fitur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fitur.create');
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
        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'images' => 'required|image',
        ]);

        if ($validator->fails()) {
            $res = $validator->errors();
            dd($res);
        } else {
            $data = [
                'title' => $request->title,
                'desc' => $request->desc,
            ];

            $file = $request->file('images');
            $tujuan_upload = 'fitur';
            // cek file
            if (!empty($file)) {
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move($tujuan_upload, $nama_file);
                $data['images'] = $nama_file;
            }
            $res = Fitur::create($data);
        }
        redirect()->route('fitur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Fitur::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fitur::findOrFail($id);
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
            $post = $validator->errors();
        } else {
            $data = [
                'title' => $request->title,
                'desc' => $request->desc,
            ];
            $post = Fitur::findOrFail($id);
            $file = $request->file('images');
            $tujuan_upload = 'data_file';
            // cek file
            if (!empty($file)) {
                $image_path = public_path($tujuan_upload . '/' . $post->images);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move($tujuan_upload, $nama_file);
                $data['images'] = $nama_file;
            }
            $post->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Fitur::findOrFail($id);
        $post->delete();
    }
}
