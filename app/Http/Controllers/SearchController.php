<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\User;
use \Spatie\Tags\Tag;

class SearchController extends Controller
{
    public function index(Request $request) {

      $query = $request->input('query');
      if (empty($query)) {
        return $this->landing();
      }

      return $this->results($query);
    }

    private function landing() {

      $limitRandomResults = 20;

      // grab some songs
      $viewData = [
        'tracks' => Track::inRandomOrder()->limit($limitRandomResults)->get(),
        'albums' => Track::select('album', 'artist')->inRandomOrder()->groupBy('album', 'artist')->limit($limitRandomResults)->get(),
        'tags'   => Tag::inRandomOrder()->limit($limitRandomResults)->get(),
        'users'  => User::inRandomOrder()->limit($limitRandomResults)->get(),
        'query'  => ''
      ];

      return view('search')->with($viewData);
    }

    public function results($query) {

      // grab some songs
      $viewData = [
        'tracks' => Track::where('title', 'like', "%$query%")->get(),
        'albums' => Track::select('album', 'artist')->where('album', 'like', "%$query%")->groupBy('album', 'artist')->get(),
        'tags'   => Tag::where('name', 'like', "%$query%")->get(),
        'users'  => User::where('name', 'like', "%$query%")->get(),
        'query'  => $query
      ];

      return view('search')->with($viewData);
    }
}
