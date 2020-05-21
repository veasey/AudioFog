<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use \Spatie\Tags\Tag;

class PlayerController extends Controller
{
    public function welcome() {

      // grab some songs
      $viewData = [
        'tracks' => Track::inRandomOrder()->get(),
        'tags'   => Tag::inRandomOrder()->get()
      ];
      return view('welcome')->with($viewData);
    }
}
