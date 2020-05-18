@extends('layouts.app')

@section('content')
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="/upload">Upload</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/tracks">Your Tracks</a>
    </li>
  </ul>

  <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="p-3 border-left border-right">

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
      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <input type="submit" value=" Save " />
  </form>

</div>
@endsection
