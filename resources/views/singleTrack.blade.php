@extends('layouts.player')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-8">

      <h2>{{ $track->title }}</h2>

      @if ($track->album || $track->artist)
      <p>
        @if ($track->album)
          From the album <b>{{ $track->album }}</b>
        @endif
        @if ($track->artist)
          by <a href="/artist?search={{ $track->artist }}">{{ $track->artist }}</a>
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
      <!-- tracks -->
      <ul>
        @foreach ($tags as $tag)
          <li class="tag list-unstyled"><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
