<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class PlayerController extends Controller
{
    public function welcome() {

      // grab some songs
      return view('welcome')->with('tracks', Track::inRandomOrder()->get());
    }
}
