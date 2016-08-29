<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    protected $table = 'covers';


    public function book() 
    {
        return $this->belongsTo('App\Book', 'id', 'book_id');
    }
}
