@extends('layout')
@section('content')
    @foreach($authors as $author)
        {{$author->name }} <a class="btn btn-default" href="{!!action('AuthorController@destroyAuthor', ['id' => $author->id] ) !!}" role="button"> Delete Auhtor </a> </br>
    @endforeach

@endsection('content')