@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.upload') }}">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('dashboard.tracks') }}">Your Tracks</a>
    </li>
  </ul>

  <div class="p-3 border-left border-right">

    <h2>Edit {{$track->title}}</h2>

    <form action="{{ route('track.update', $track->id) }}" method="POST" enctype="multipart/form-data">

      @include('inc.messages')
      @method('PATCH')

      {{ csrf_field() }}

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{ $track->title }}">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="3">{{ $track->desc }}</textarea>
      </div>

      <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" aria-describedby="tags" placeholder="#rock #guitar #boldaslove" value="{{ $track->getTags() }}">
      </div>

      <button class="btn btn-primary" type="submit">Update</button>
    </form>

    <form action="{{ route('track.destroy', $track->id)}}" method="post" class="pt-1">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
  </div>
</div>
@endsection
