@extends('layout')
@section('content')
    <h2> {{ $book->title }}  </h2>  </br>
    Author:  {{ isset($book->authors->first()->name) ? $book->authors->first()->name : null}}

    <a class="btn btn-default" href="{!!action('AuthorController@addAuthor', ['bookId' => $book->id] ) !!}" role="button"> Add Author </a> 

    <a class="btn btn-default" href="{!!action('AuthorController@deleteAuthor', ['bookId' => $book->id]) !!}" role="button"> Delete Auhtor </a> </br>

    Genre:  {{ isset($book->genres->first()->name) ? $book->genres->first()->name : null}} 
    <a class="btn btn-default" href="{!!action('GenreController@addGenre', ['bookId' => $book->id] ) !!}" role="button"> Add Genre </a> 

    <a class="btn btn-default" href="{!!action('GenreController@deleteGenre', ['bookId' => $book->id] ) !!}" role="button"> Delete Genre </a> </br>

    <div class="form-group">
      <label for="authors"> Edit Book: </label>
    <a class="btn btn-default" href="{!!action('BookController@edit', ['id' => $book->id])!!}" role="button"> Edit </a>

    <form action="{{action('BookController@destroy', ['id' => $book->id])}}" method="Post"">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="DELETE">
    {{-- <div class="form-group"> --}}
      <label for="authors"> Delete Book: </label>
    {{-- </div> --}}
    <button type="submit" class="btn btn-default">Delete</button>
    </form>
    </div>
@endsection('content')