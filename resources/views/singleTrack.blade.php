@extends('layouts.player')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-8">

      <h2>{{ $track->title }}</h2>

      @if ($track->album)
        <h3>{{ $track->album }}</h3>
      @endif

      @if ($track->artist)
        <h4>{{ $track->artist }}</h4>
      @endif

      <p>{{ $track->desc}}</p>

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
