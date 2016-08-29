<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function book() 
    {
        $this->belongsTo('App\Book', 'id', 'book_id');
    }
}
