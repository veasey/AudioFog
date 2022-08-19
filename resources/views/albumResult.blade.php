@extends('layouts.player')
@section('content')

  <div class="jumbotron mt-3">
    <h1>{{$album}}</h1>
    <h2>by <a href="/artist?artist={{ $artist }}">{{ $artist }}</a></h2>
    <a href="/soundboard?album={{ $album }}&artist={{ $artist }}">Soundboard</a>
  </div>

  <div class="row">
      <!-- tracks -->
      <ul class="tracks list-unstyled">
        @forelse ($tracks as $track)
          <x-track trackid="{{ $track->id }}" />
        @endforeach
      </ul>


  </div>

@endsection
