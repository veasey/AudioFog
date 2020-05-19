<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Track;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TracksController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    /**
     * show upload form
     */
    public function create() {
      return view('upload.upload');
    }

    /**
     * show track list
     */
    public function show() {
      $tracks = Track::where('user_id', auth()->user()->id)->get();
      return view('upload.tracks')->with('tracks', $tracks);
    }

    /**
     * show edit track form
     */
    public function edit($id) {
      $track = Track::findOrFail($id);
      return view('upload.edit')->with('track', $track);
    }

    /**
     * DELETE track
     */
    public function destroy($id) {

      $track = Track::findOrFail($id);

      // delete from disk
      $id = auth()->user()->id;
      $filepath = "/audiofiles/$id/$track->filename";
      Storage::delete($filepath);

      // delete from DB
      $track->delete();

      return redirect('/dashboard/tracks')->with('success', "Track $track->title successfully deleted");
    }

    /**
     * UPDATE track details
     */
    public function update(Request $request, $id)
    {
      $track = Track::findOrFail($id);
      $track->update($request->validate(['title' => 'required']));
      return redirect('/dashboard/tracks')->with('success', "Track $track->title successfully updated");
    }

    /**
     * UPLOAD new track
     */
    public function store(Request $request) {

      // validate input
      $validatedData = $request->validate([
        'title' => 'required',
        'audiofile' => [
          'mimes:mp3,wav,mpeg,mpga',
          'required'
        ]
      ]);

      $id = auth()->user()->id;
      $filepath = "audiofiles/$id/";

      // store file
      $extension = $request->audiofile->extension();
      $filename =  Str::slug($request->title, '_') . '_' . Str::random(3) . ".$extension";
      $request->audiofile->storeAs($filepath, $filename);

      // store track data
      $track = new Track();
      $track->filename = $filename;
      $track->user_id = $id;
      $track->title = $request->title;
      $track->desc = $request->description;
      $track->save();

      return redirect('/dashboard/upload')->with('success', "Your track '$track->title' has been uploaded.");
    }
}
