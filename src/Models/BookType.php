<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model {

    protected $table = 'book_types';

    protected $fillable = ['name', 'description'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_type', 'type_id', 'book_id');
    }
}
