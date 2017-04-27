<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Book
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $cover
 */
class Book extends Model {
    use MetaTrait, SoftDeletes;

    protected $meta_model = 'Inspirium\BookManagement\Models\BookModelMeta';

    protected $fillable = ['title', 'description', 'cover'];

    protected $dates = ['deleted_at'];

    public function authors() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Author', 'author_book', 'book_id','author_id');
    }

    public function categories() {
        $this->belongsToMany('Inspirium\BookManagement\Models\BookCategory', 'book_category', 'book_id', 'category_id');
    }

    public function types() {
        $this->belongsToMany('Inspirium\BookManagement\Models\BookType', 'book_type', 'book_id', 'type_id');
    }
}
