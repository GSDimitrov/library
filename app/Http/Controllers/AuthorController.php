<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use App\Book;

class AuthorController extends Controller
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
    public function addAuthor($bookId)
    {
        return view('author.create', ['bookId' => $bookId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAuthor(Request $request)
    {
        $author = new Author;
        $book = Book::find($request->input('book_id'));

        $author->name = $request->input('author');
        $author->save();
        $book->authors()->save($author);

        return redirect('/')->with('status', 'New Author Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAuthor($bookId)
    {
        $authors = Author::where('book_id', $bookId)->get();
        return view('author.delete', ['authors' => $authors]);
    }

    public function destroyAuthor($id)
    {
        $author = Author::find($id);
        $author->destroy($id);
        return redirect('/')->with('status', 'Author Has Been Deleted!');
    }
}
