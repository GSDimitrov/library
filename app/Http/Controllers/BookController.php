<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use App\Genre;
use App\Cover;
use App\Author;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeBook;
use App\Http\Requests\UploadBook;

class BookController extends Controller
{

    private $book;
    private $author;
    private $genre;
    private $cover;

    public function __construct(Book $book, Author $author, Genre $genre, Cover $cover) 
    {
        $this->book   = $book;
        $this->author = $author;
        $this->genre  = $genre;
        $this->cover  = $cover;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allBooks = $this->book->with('authors', 'genres', 'covers')->paginate(5);
        // return view('book.index', ['books' => $allBooks]);
    }

    public function home()
    {
        $allBooks = $this->book->with('authors', 'genres', 'covers')->paginate(5);
        return view('book.index', ['books' => $allBooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadBook $request)
    {
        $user = User::find(1)->first();

        // save a new book with user relation 
        $this->book->title = $request->input('title');
        $this->book->isbn10 = $request->input('isbn10');
        $this->book->isbn13 = $request->input('isbn13');
        $user->books()->save($this->book);     

        // save new author wih book relation
        $this->author->name = $request->input('author');
        $this->author->save();
        $this->book->authors()->save($this->author);

        // save new genre with book relation
        $this->genre->name = $request->input('genre');
        $this->genre->save();
        $this->book->genres()->save($this->genre);

        if($request->hasFile('cover')) {

            $fileName = $request->file('cover')->getClientOriginalName();
            $destination = public_path('covers');

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $request->file('cover')->move($destination, $fileName);

            $this->cover->name = $fileName;
            $this->cover->save();
            $this->book->covers()->save($this->cover);

        }

        return redirect('/')->with('status', 'Book Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->with('authors', 'genres')->find($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookToEdit = $this->book->with('authors', 'genres')->find($id);
        return view('book.edit', ['book' => $bookToEdit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangeBook $request, $id)
    {
        $user = User::find(1)->first();

        // save a new book with user relation 
        $book = $this->book->with('authors', 'genres')->find($id);
        // dd($recordToUpdate);
        $book->title = $request->input('title');
        $book->isbn10 = $request->input('isbn10');
        $book->isbn13 = $request->input('isbn13');

        $user->books()->save($book);     
        // save new author wih book relation

        if ($request->has('author')) {
            $authorId = $request->input('author_id');

            $bookWithAuthor = Book::with(['authors' => function ($query) use($authorId) {
                $query->where('id', $authorId);
            }])->first();

            $author = $bookWithAuthor->authors->first();

            if ($author === null) {
                $author = new Author;
                $author->name = $request->input('author');
                $author->save();
                $book->authors()->save($author);
            }
            $author->name = $request->input('author');
            $author->save();
        }

        // save new genre with book relation
        if ($request->has('genre')) {

            $genreId = $request->input('genre_id');

            $bookWithGenre = Book::with(['genres' => function ($query) use($genreId) {
                $query->where('id', $genreId);
            }])->first();

            $genre = $bookWithAuthor->genres->first();

            if ($genre === null) {
                $genre = new Genre;
                $genre->name = $request->input('genre');
                $genre->save();
                $book->genres()->save($author);
            }
            $genre->name = $request->input('genre');
            $genre->save();
            // $this->book->genres()->save($this->genre);
        }

        // if ($request->hasFile('cover')) {

        //     $fileName = $request->file('cover')->getClientOriginalName();
        //     $destination = public_path('covers');

        //     if (!file_exists($destination)) {
        //         mkdir($destination, 0777, true);
        //     }

        //     $request->file('cover')->move($destination, $fileName);
        //     $cover = $this->cover->find($id);
        //     if ($cover != null) {
        //         $cover->name = $fileName;
        //         $cover->save();                
        //     }
        // }

        return redirect('/')->with('status', 'Book Has Been Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookToDelete = $this->book->find($id);
        $bookToDelete->delete();
        return redirect('/')->with('status', 'Book Has Been Deleted!');

    }
}
