<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'cover'];

    protected $dates = ['deleted_at'];

    public function authors() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Author', 'author_book', 'book_id','author_id');
    }

    public function categories() {
        $this->belongsToMany('Inspirium\BookManagement\Models\BookCategory', 'book_category_pivot', 'book_id', 'category_id');
    }

    public function types() {
        $this->belongsToMany('Inspirium\BookManagement\Models\BookType', 'book_type_pivot', 'book_id', 'type_id');
    }

    public function schools() {
        $this->belongsToMany('Inspirium\BookManagement\Models\SchoolType', 'book_school_type_pivot', 'book_id', 'school_id');
    }

    public function subjects() {
        $this->belongsToMany('Inspirium\BookManagement\Models\SchoolSubject', 'book_school_subject_pivot', 'book_id', 'subject_id');
    }

    public function biblioteca() {
        $this->belongsTo('Inspirium\BookManagemet\Models\BookBiblioteca');
    }
}
