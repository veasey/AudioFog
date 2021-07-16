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

      @include('inc.messages')
      @method('PATCH')

      {{ csrf_field() }}

      <div class="form-group">
        <label for="name">Artist Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $user->name }}">
      </div>

      <button class="btn btn-primary" type="submit">Update</button>

    </form>


  </div>

</div>
@endsection
