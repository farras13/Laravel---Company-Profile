<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use App\Models\Pages;
use App\Models\Portofolio;
use App\Models\Services;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['dashboard'] = Pages::where('section', 'Dashboard')->first();
        $data['about'] = Pages::where('section', 'About')->first();
        $data['service'] = Pages::where('section', 'Service')->first();
        $data['tesmon'] = Pages::where('section', 'Testimoni')->first();
        $data['portofolio'] = Pages::where('section', 'Portofolio')->first();
        $data['services'] = Services::all();
        $data['fitur'] = Fitur::all();
        $data['tagsporto'] = Portofolio::groupby('tags')->select('tags', DB::raw('count(*) as total'))->get();
        $data['porto'] = Portofolio::all();
        $data['testimoni'] = Testimoni::all();
        return view('index', $data);
    }
}
