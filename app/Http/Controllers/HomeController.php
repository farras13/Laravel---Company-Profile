<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['dashboard'] = Pages::where('section', 'Dashboard')->first();
        $data['about'] = Pages::where('section', 'About')->first();
        return view('index', $data);
    }
}
