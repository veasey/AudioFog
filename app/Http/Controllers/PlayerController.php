<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\User;
use \Spatie\Tags\Tag;
use Auth;

class PlayerController extends Controller
{
    public function welcome() {

      // grab some songs
      $viewData = [
        'tracks' => Track::orderBy('created_at', 'desc')->get(),
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
      return view('singleTrack')->with($viewData);
    }

    public function addPlay(Request $request) {

      $track = Track::findOrFail($request->id);
      $track->plays++;
      $track->save();

      return response('Thankyou Listener', 200)
        ->header('Content-Type', 'text/plain');
    }

    public function searchArtist(Request $request) {

      $artist = $request->input('artist');
      if (!$tracks = Track::where('artist', '=', $artist)->get()) {
        abort(404);
      }

      $albums = Track::select('album')
                     ->where('artist', '=', $artist)
                     ->distinct('album')
                     ->get();

      $viewData = [
        'tracks' => $tracks,
        'artist' => $artist,
        'albums'  => $albums
      ];
      return view('artistResult')->with($viewData);
    }


    // @todo - put in search controller
    public function searchAlbum(Request $request) {

      $artist = $request->input('artist');
      $album = $request->input('album');
      if (!$tracks = Track::where('artist', '=', $artist)
                          ->where('album', '=', $album)
                          ->get()) {
        abort(404);
      }

      $viewData = [
        'tracks' => $tracks,
        'artist' => $artist,
        'album'  => $album
      ];
      return view('albumResult')->with($viewData);
    }
}
