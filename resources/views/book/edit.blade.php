@extends('layout')
@section('content')

<form action="{{action('BookController@update', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PUT">

  <div class="form-group">
    <label for="title"> Title </label>
    <input type="text" class="form-control" name="title" value="{{ $book->title }}" placeholder="Tile">
  </div>
{{--   <div class="form-group">
    <label for="isbn10"> ISBN 10 </label>
    <input type="text" class="form-control" name="isbn10" value="{{ $book->isbn10 }}" placeholder="ISBN  10">
  </div>
  <div class="form-group">
    <label for="isbn13"> ISBN 13  </label>
    <input type="text" class="form-control" name="isbn13" value="{{$book->isbn13 }}" placeholder="ISBN 13 ">
  </div>
 --}}  @foreach($book->authors as $author)
    <div class="form-group">
      <label for="authors"> authors </label>
      <input type="text" class="form-control" name="author" value="{{ isset($author->name) ? $author->name : null }}" placeholder="Authors">
      <input type="hidden" name="author_id" value="{{ $author->id }}">
    </div>
  @endforeach

  @foreach($book->genres as $genre)
    <div class="form-group">
      <label for="genre"> genre </label>
      <input type="text" class="form-control" name="genre" value="{{ isset($genre->name) ?  $genre->name : null }}" placeholder="Genre">
      <input type="hidden" name="genre_id" value="{{ $genre->id }}">
    </div>
  @endforeach
  {{-- <div class="form-group"> --}}
    {{-- <label for="cover">Upload Book Cover</label> --}}
    {{-- <input type="file" name="cover"> --}}
    {{-- <p class="help-block">Example block-level help text here.</p> --}}
  {{-- </div> --}}

  <button type="submit" class="btn btn-default">Submit</button>
</form>

@include('partials.error')

@endsection('content')
