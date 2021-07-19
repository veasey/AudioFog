@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.upload') }}">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.tracks') }}">Your Tracks</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('dashboard.profile') }}">Your Profile</a>
    </li>
  </ul>

  <div class="p-3 border-left border-right">

    @include('inc.messages')

    <form action="{{ route('dashboard.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">

      @method('PATCH')

      {{ csrf_field() }}

      <div class="row">

        <div class="col-md-6">
          <h3>Account Details</h3>
          <hr />
          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="email" value="{{ $user->email }}">
          </div>
        </div>

        <div class="col-md-6">
          <h3>Security</h3>
          <hr />

          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" value="">
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation" value="">
          </div>
        </div>

      </div>

      <button class="btn btn-primary" type="submit">Update</button>

    </form>


  </div>

</div>
@endsection
