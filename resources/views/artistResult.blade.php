@extends('layouts.player')
@section('content')

  <div class="jumbotron mt-3">
    <h1 class="display-4">{{$artist}}</h1>
  </div>

  <div class="row">

      <!-- tracks -->
      @if (!$albums->isEmpty())
      <div class="col-md-6">
        <h3>Tracks</h3>
      @endif

        <ul class="tracks list-unstyled">
          @forelse ($tracks as $track)
            <x-track trackid="{{ $track->id }}" />
          @endforeach
        </ul>

      @if (!$albums->isEmpty())
      </div>
      <!-- albums -->
      <div class="col-md-6">
        <h3>Albums</h3>
      @endif

        <ul class="tracks list-unstyled">
          @forelse ($albums as $album)
            <a href="/album?artist={{$artist}}&album={{$album->album}}">
              <span class="py-2" style="font-size: 1.5em">{{$album->album}}</span>
            </a>
          @endforeach
        </ul>

      @if (!$albums->isEmpty())
      </div>
      @endif
  </div>

@endsection
