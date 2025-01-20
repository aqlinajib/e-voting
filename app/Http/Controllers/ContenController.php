<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContenController extends Controller
{
    public function content()
    {
        return view('index');
    }
}
