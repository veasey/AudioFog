@extends('layouts.player')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-md">
      <!-- tracks -->
      <ul class="tracks list-unstyled">
          <x-track trackid="{{ $track->id }}" />
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
