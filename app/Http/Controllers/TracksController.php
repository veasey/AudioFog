<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TracksController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function show() {
      $tracks = Track::where('user_id', auth()->user()->id)->get();
      return view('upload.tracks')->with('tracks', $tracks);
    }

    public function destroy($id) {

      $track = Track::findOrFail($id);

      // delete from disk
      $id = auth()->user()->id;
      $filepath = "/audiofiles/$id/$track->filename";
      Storage::delete($filepath);

      // delete from DB
      $track->delete();

      return redirect('/tracks')->with('success', "Track $track->title successfully deleted");
    }

    public function edit($id) {
      $track = Track::findOrFail($id);
      return view('upload.edit')->with('track', $track);
    }

    public function update(Request $request, $id)
    {
      $track = Track::findOrFail($id);
      $track->update($request->validate(['title' => 'required']));
      return redirect('/tracks')->with('success', "Track $track->title successfully updated");
    }
}
