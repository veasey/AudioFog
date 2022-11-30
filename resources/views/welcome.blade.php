@extends('layouts.player')
@section('content')

  <h2>Freshest Uploads</h2>

  <div class="row">

    <div class="col-md my-2">
      <!-- tracks -->
      @forelse ($tracks as $track)
        <x-track_full trackid="{{ $track->id }}" />
      @empty
        <p>No tracks yet. Maybe <a href="{{route('dashboard.upload')}}">upload</a> some?</p>
      @endforelse
    </div>

    <div class="col-md-4 my-2">
      @forelse ($tags as $tag)
        <div class="tag">
          <a href="{{ route('tag', ['tag' => $tag->name]) }}">
            {{ $tag->name }} 
          </a>
        </div>
      @empty
        <p>No tagged tracks found</p>
      @endforelse
    </div>

  </div>

  <!-- info -->
  <div class="p-5 text-white bg-dark rounded-3">
    <p class="py-2">All tracks here are composed by myself and are free to download and listen to. I would love to hear from you if you find something you enjoy.</p>
    <p class="py-2">This is a free web app to play and share music. Get in touch <a href="https://clintveasey.co.uk">here</a> if you need any help getting set up.</p>
    <p class="py-2">If you would like to expand on this code or have an ideas to make it better than feel free to check out the project on <a href="https://github.com/veasey/AudioFog">https://github.com/veasey/AudioFog</a>.</p>
  </div>
@endsection
