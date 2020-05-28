<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Track;
use \Spatie\Tags\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TracksController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    // show upload form
    public function create() {
      return view('upload.upload');
    }

    // show user's track list
    public function show() {
      $tracks = Track::where('user_id', auth()->user()->id)->get();
      return view('upload.tracks')->with('tracks', $tracks);
    }

    // edit track form
    public function edit($id) {
      $track = Track::findOrFail($id);
      return view('upload.edit')->with('track', $track);
    }

    public function destroy($id) {

      $track = Track::findOrFail($id);

      // detach tags
      $track->tags()->detach();

      // delete from disk
      $id = auth()->user()->id;
      $filepath = "/audiofiles/$id/$track->filename";
      Storage::delete($filepath);

      // delete from DB
      $track->delete();

      return redirect('/dashboard/tracks')->with('success', "Track $track->title successfully deleted");
    }

    public function update(Request $request, $id)
    {
      $track = Track::findOrFail($id);
      $validatedData = $request->validate([
        'title' => 'required',
        'desc' => 'max:255',
        'year' => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
        'artist' => 'max:255',
        'album' => 'max:255'
      ]);
      $track->update($validatedData);
      $track->updateTags($request->tags);
      return redirect('/dashboard/tracks')->with('success', "Track $track->title successfully updated");
    }

    public function store(Request $request) {

      // validate input
      $validatedData = $request->validate([
        'audiofile' => 'mimes:mp3,wav,mpeg,mpga|required',
        'title' => 'required|unique:track',
        'desc' => 'max:255',
        'year' => 'digits:4|integer|min:1900|max:'.(date('Y')+1),
        'artist' => 'max:255',
        'album' => 'max:255'
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
      $track->save($validatedData);
      $track->updateTags($request->tags);

      return redirect('/dashboard/upload')->with('success', "Your track '$track->title' has been uploaded.");
    }
}
