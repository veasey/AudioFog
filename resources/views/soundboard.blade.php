@extends('layouts.player')
@section('content')

  <div class="jumbotron mt-3">
    <h1>{{$album}} Soundboard</h1>
  </div>

  <div class="row soundboard">

      <!-- tracks -->

        @forelse ($tracks as $track)
          <x-track trackid="{{ $track->id }}" />
        @endforeach


  </div>

@endsection
