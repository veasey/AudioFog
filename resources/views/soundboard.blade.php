@extends('layouts.player')
@section('content')

  <div class="jumbotron mt-3">
    <h1>{{$album}} Soundboard</h1>
    <p>This will loop each track and allows easier switching between a collection
      of tracks. Intended for playing ambient loops for table top sessions etc. </p>
      
  </div>

  <div class="row soundboard">

      <!-- tracks -->
        <span class="tracks">
        @forelse ($tracks as $track)
          <x-track trackid="{{ $track->id }}" />
        @endforeach
      </span>


  </div>

<script type="text/javascript" defer>
  /* repeat on by default */
  //let repeatButton = document.getElementsByClassName("player-btn-repeat bi bi-arrow-clockwise");
  //repeatButton.className += " selected";

  document.getElementById("repeat").classList.add("selected");
</script>
@endsection
