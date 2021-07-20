<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use \Spatie\Tags\Tag;

class SearchController extends Controller
{
    public function index() {

      // grab some songs
      $viewData = [
        'tracks' => Track::inRandomOrder()->get(),
        'tags'   => Tag::inRandomOrder()->get(),
        'query'  => ''
      ];

      return view('search')->with($viewData);
    }
}
