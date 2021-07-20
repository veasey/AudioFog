@extends('layouts.player')
@section('content')

  <h2>Search</h2>


  <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    {{ csrf_field() }}
    <input type="text" class="form-control" id="query" name="query" aria-describedby="query" value="{{ $query }}">
  </form>
@endsection
