@extends('layouts.player')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-8">

      <h2>{{ $track->title }}</h2>

      <div class="d-none">
        <x-track trackid="{{ $track->id }}" />
      </div>

      @if ($track->album || $track->artist)
      <p>
        @if ($track->album)
          From the album <a href="/album?artist={{ $track->artist }}&album={{ $track->album }}">{{ $track->album }}</a>
        @endif
        @if ($track->artist)
          by <a href="/artist?artist={{ $track->artist }}">{{ $track->artist }}</a>
        @endif
      </p>
      @endif

      @if ($track->desc)
      <div class="my-2 p-5 text-white bg-dark rounded-3">
        <h4>Info</h4>
        <p>{{$track->desc}}</p>
      </div>
      @endif

    </div>

    <div class="col-md-4">
      <!-- tags -->
      <ul>
        @foreach ($tags as $tag)
          <div class="tag"><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></div>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
