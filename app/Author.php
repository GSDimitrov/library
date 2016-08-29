<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestaps = false;

    // public function books() 
    // {
    //     $this->belongsToMany('App\Book', 'author_book', 'author_id', 'book_id');
    // }
    public function book() 
    {
        $this->belongsTo('App\Book',  'id', 'book_id');
    }

}
