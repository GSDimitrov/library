@extends('layout')
@section('content')
    <form action="{{action('GenreController@storeGenre')}}" method="Post"">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label for="authors"> Add genres: </label>

      <input type="hidden" name="book_id" value="{{ $bookId }}">
      <input type="text" class="form-control" value="{{ old('author') }}" name="genre" placeholder="Genre">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection('content')