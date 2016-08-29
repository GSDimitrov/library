<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Genre;
use App\Book;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addGenre($bookId)
    {
        return view('genre.create', ['bookId' => $bookId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGenre(Request $request)
    {
        $genre = new Genre;
        $book = Book::find($request->input('book_id'));
        $genre->name = $request->input('genre');
        $genre->save();
        $book->genres()->save($genre);

        return redirect('/')->with('status', 'New Genre Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteGenre($bookId)
    {
        $genres = Genre::where('book_id', $bookId)->get();
        return view('genre.delete', ['genres' => $genres]);
    }

    public function destroyGenre($id)
    {
        $genre = Genre::find($id);
        $genre->destroy($id);
        return redirect('/')->with('status', 'Genre Has Been Deleted!');
    }
}
