<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function audio()
    {
        return view('resources.audio');
    }
    public function video()
    {
        return view('resources.video');
    }
    public function games()
    {
        return view('resources.games');
    }
    public function quiz()
    {
        return view('resources.quiz');
    }
}
