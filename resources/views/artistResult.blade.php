@extends('layouts.player')
@section('content')

  <div class="jumbotron mt-3">
    <h1 class="display-4">{{$artist}}</h1>
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
