<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    // show user's track list
    public function show() {
      return view('upload.profile')->with('user', auth()->user());
    }

    public function update(Request $request, $id)
    {
      // do stuff
    }

}
