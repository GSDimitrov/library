@extends('layout')
@section('content')
    @foreach($genres as $genre)
        {{$genre->name }} <a class="btn btn-default" href="{!!action('GenreController@destroyGenre', ['id' => $genre->id] ) !!}" role="button"> Delete Genre </a> </br>
    @endforeach

@endsection('content')