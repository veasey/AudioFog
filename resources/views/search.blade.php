@extends('layouts.player')
@section('content')

  <h2>Search</h2>


  <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    {{ csrf_field() }}

    <div class="input-group mb-3">
      <input type="text" class="form-control" id="query" name="query" aria-describedby="query" value="{{ $query }}">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </div>
  </form>

  <hr />

  <div class="row">
    <div class="col-md-3">
      <h4>Tracks</h4>
      @forelse ($tracks as $track)

        <x-track trackid="{{ $track->id }}" />

      @empty
        <p>No tracks found</p>
      @endforelse
    </div>
    <div class="col-md-3">
      <h4>Albums</h4>
      @forelse ($albums as $album)
        <a href="/album?artist={{ $album->artist }}&album={{ $album->album }}">
          <div>{{ $album->album  }}</div>
        </a>
      @empty
        <p>No albums found.</p>
      @endforelse
    </div>
    <div class="col-md-3">
      <h4>Tags</h4>
      @forelse ($tags as $tag)
        <div><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></div>
      @empty
        <p>No tags found</p>
      @endforelse
    </div>
    <div class="col-md-3">
      <h4>Artists</h4>
      @forelse ($users as $user)
        <a href="/artist?artist={{$user->name}}">
          <div>{{ $user->name }}</div>
        </a>
      @empty
        <p>No users found</p>
      @endforelse
    </div>
  </div>

@endsection
