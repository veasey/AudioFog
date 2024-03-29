@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.upload') }}">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('dashboard.tracks') }}">Your Tracks</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.profile') }}">Your Profile</a>
    </li>
  </ul>

  <div class="p-3 border-left border-right">

    @include('inc.messages')

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Plays</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tracks as $track)
          <tr>
            <td><a href="{{ route('track.edit', $track->id) }}">{{ $track->title }}</a></td>
            <td>{{ $track->plays }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection
