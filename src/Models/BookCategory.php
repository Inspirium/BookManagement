<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model {

    protected $table = 'book_categories';

    protected $fillable = ['name', 'description'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_category_pivot', 'category_id', 'book_id');
    }

    public function parent() {
        $this->belongsTo('Inspirium\BookManagement\Models\BookCategory');
    }

    public function children() {
        $this->hasMany('Inspirium\BookManagement\Models\BookCategory', 'parent');
    }
}
