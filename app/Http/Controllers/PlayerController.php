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

    // return tracks with tag
    public function getTagged($tag) {

      if (!Tag::findFromString($tag)) {
        abort(404);
      }

      $viewData = [
        'tracks' => Track::withAnyTags([$tag])->get(),
        'tags'   => Tag::inRandomOrder()->get(),
        'tag'    => $tag
      ];
      return view('taggedTracks')->with($viewData);
    }

    // show a single track
    public function getTrack($id) {
      if (!$track = Track::findOrFail($id)) {
        abort(404);
      }

      $viewData = [
        'track' => $track,
        'tags'   => Tag::inRandomOrder()->get()
      ];
      return view('taggedTracks')->with($viewData);
    }

    public function addPlay(Request $request) {

      $track = Track::findOrFail($request->id);
      $track->plays++;
      $track->save();

      return response('Thankyou Listener', 200)
        ->header('Content-Type', 'text/plain');
    }
}
