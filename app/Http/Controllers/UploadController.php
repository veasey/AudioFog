<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Track;

class UploadController extends Controller
{

  private $request;

  public function __construct() {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {

    $this->request = $request;

    if ($request->isMethod('post')) {
        return $this->uploadNewFile();
    }

    return view('upload.upload');
  }

  /**
   * store audio file and details
   */
  private function uploadNewFile() {

    // validate input
    $validatedData = $this->request->validate([
      'title' => 'required',
      'audiofile' => [
        'mimes:mp3,wav,mpeg,mpga',
        'required'
      ]
    ]);

    $id = auth()->user()->id;
    $filepath = "audiofiles/$id/";
    $filename = $this->generateFileName();

    $this->request->audiofile->storeAs($filepath, $filename);

    $track = new Track();
    $track->filename = $filename;
    $track->user_id = $id;
    $track->title = $this->request->title;
    $track->desc = $this->request->description;
    $track->save();

    return redirect('/upload')->with('success', "Your track '$track->title' has been uploaded.");
  }

  /**
   * generate file name
   * @return string
   */
  private function generateFileName() {
    $extension = $this->request->audiofile->extension();
    return Str::slug($this->request->title, '_') . '_' . Str::random(3) . ".$extension";
  }

}
