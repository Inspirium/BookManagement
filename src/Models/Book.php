<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Inspirium\BookManagement\Models\Book
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $cover
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Book onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Book withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Book withoutTrashed()
 * @mixin \Eloquent
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
        $this->belongsTo('Inspirium\BookManagement\Models\BookBiblioteca');
    }
}
