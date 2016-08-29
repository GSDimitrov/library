<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'isbn10',
        'isbn13',
    ];

    // public function authors() 
    // {
    //     return $this->belongsToMany('App\Author', 'author_book', 'book_id', 'author_id');
    // }

    // public function genres() 
    // {
    //     return $this->belongsToMany('App\Genre', 'genre_book', 'book_id', 'genre_id');
    // }

    public function authors() 
    {
        return $this->hasMany('App\Author', 'book_id', 'id');
    }

    public function genres() 
    {
        return $this->hasMany('App\Genre', 'book_id', 'id');
    }




    public function user() 
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function covers() 
    {
        return $this->hasMany('App\Cover', 'book_id', 'id');
    }
}
