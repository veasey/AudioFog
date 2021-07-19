<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

      $validatedData = [];
      $user = User::findOrFail($id);

      // if new name entered
      if ($request->input('name') != auth()->user()->name) {
        $validatedData[] = $request->validate([
          'name' => 'unique:users|required|max:255',
        ]);

        $request->user()->fill([
            'name' => $request->input('name')
        ])->save();
      }

      // if new email entered
      if ($request->input('email') != auth()->user()->email) {
        $validatedData[] = $request->validate([
          'email' => 'email:rfc,dns',
        ]);

        $request->user()->fill([
            'email' => $request->input('email')
        ])->save();
      }

      // validate password fields if updated
      if (!empty($request->input('password'))) {

        $validatedPasswords[] = $request->validate([
          'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed',
          'password_confirmation' => 'required|same:password'
        ]);

        // hash new password
        $request->user()->fill([
            'password' => Hash::make($request->input('password'))
        ])->save();
      }

      if (!empty($validatedData)) {
        return redirect('/dashboard/profile')->with('success', "Your profile was updated");
      } elseif (!empty($request->input('password'))) {
        return redirect('/dashboard/profile')->with('success', "Your password was changed");
      }

      return redirect('/dashboard/profile');
    }

}
