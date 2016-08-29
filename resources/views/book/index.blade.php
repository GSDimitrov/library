@extends('layout')
@section('content')

<div class="container">
    @foreach ($books as $book)

        <a href="{{url('book', $book->id)}}"> {!! $book->title ."<br>" !!}  </a>
        @foreach($book->authors as $author)
             {{isset($author->name) ?  $author->name : null }}</br>
        @endforeach

        @foreach($book->genres as $genre)
             {{isset($genre->name) ?  $genre->name : null }}</br>
        @endforeach

        @foreach($book->covers as $cover)
            <img src="{{asset('/covers/'. $cover->name) }}"> </br>
        @endforeach
    @endforeach
</div>
<div>
    <a class="btn btn-default" href="{!!url('book/create')!!}" role="button"> Create Book </a> </br>
</div>

@include('partials.status')

{{ $books->links() }}

@endsection('content')
