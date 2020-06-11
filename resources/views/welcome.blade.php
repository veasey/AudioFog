@extends('layouts.player')
@section('content')

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
@endsection
