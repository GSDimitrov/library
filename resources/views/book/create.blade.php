@extends('layout')
@section('content')

<form action="{{action('BookController@store')}}" method="Post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="title"> Title </label>
    <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Tile">
  </div>
  <div class="form-group">
    <label for="isbn10"> ISBN 10 </label>
    <input type="text" class="form-control" value="{{ old('isbn10') }}" name="isbn10" placeholder="ISBN  10">
  </div>
  <div class="form-group">
    <label for="isbn13"> ISBN 13  </label>
    <input type="text" class="form-control"  value="{{ old('isbn13') }}" name="isbn13" placeholder="ISBN 13 ">
  </div>
  <div class="form-group">
    <label for="authors"> authors </label>
    <input type="text" class="form-control" value="{{ old('author') }}" name="author" placeholder="Authors">
  </div>
  <div class="form-group">
    <label for="genre"> genre </label>
    <input type="text" class="form-control" value="{{ old('genre') }}" name="genre" placeholder="Genre">
  </div>
  <div class="form-group">
    <label for="cover">Upload Book Cover</label>
    <input type="file" name="cover">
        {{-- <input type="text" class="form-control" name="cover" placeholder="Genre"> --}}

    {{-- <p class="help-block">Example block-level help text here.</p> --}}
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

@include('partials.error')

@endsection('content')
