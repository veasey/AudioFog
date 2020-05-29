@extends('layouts.player')
@section('content')

<div class="container">

  <div class="jumbotron mt-3">
    <h1 class="display-4">{{$tag}}</h1>
    <p class="lead">All tracks tagged as <a href="{{route('tag', $tag)}}">{{$tag}}</a></p>
  </div>

  <x-track-info />

  <div class="row">
    <div class="col-md">
      <!-- tracks -->
      <ul class="tracks list-unstyled">
        @forelse ($tracks as $track)
          <x-track trackid="{{ $track->id }}" />
        @endforeach
      </ul>
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
