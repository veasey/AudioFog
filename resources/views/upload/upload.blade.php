@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('dashboard.upload') }}">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.tracks') }}">Your Tracks</a>
    </li>
  </ul>

  <form action="{{ route('track.store') }}" method="POST" enctype="multipart/form-data" class="p-3 border-left border-right">

    @include('inc.messages')
    {{ csrf_field() }}

    <div class="form-group">
      <label for="audiofile">Audio File</label>
      <input type="file" class="form-control-file" id="audiofile" name="audiofile">
    </div>

    <div class="form-group">
      <label for="title">Track Title</label>
      <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Track title">
    </div>

    <div class="form-group">
      <label for="description">Track Description</label>
      <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="tags">Tags</label>
      <input type="text" class="form-control" id="tags" name="tags" aria-describedby="tags" placeholder="#rock #guitar #boldaslove">
    </div>

    <input type="submit" value=" Save " />
  </form>

</div>
@endsection
