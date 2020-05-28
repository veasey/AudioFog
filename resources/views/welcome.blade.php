@extends('layouts.player')
@section('content')
<div class="jumbotron mt-3 welcome">
  <h1 class="display-4">Clint Veasey</h1>
  <p class="lead">A collection of noises for your ears</p>
</div>

<div class="jumbotron mt-3 info">
  <div class="row">
    <div class="col-md">
      <p class="lead song-title"></p>
      <p class="song-album"></p>
      <p class="song-year"></p>
    </div>
    <div class="col-md">
      <p class="song-desc"></p>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md">
      <!-- tracks -->
      <ul class="tracks list-unstyled">
        @forelse ($tracks as $track)
          <x-track trackid="{{ $track->id }}" />
        @empty
          <p>No tracks yet. Maybe <a href="{{route('dashboard.upload')}}">upload</a> some?</p>
        @endforelse
      </ul>
    </div>
    <div class="col-md-4">
      <!-- tracks -->
      <ul>
        @forelse ($tags as $tag)
          <li class="tag list-unstyled"><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></li>
        @empty
          <p>No tagged tracks found</p>
        @endforelse
      </ul>
    </div>
  </div>
</div>
@endsection
