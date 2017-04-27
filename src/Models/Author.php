<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Phoenix\EloquentMeta\MetaTrait;

/**
 * Class Author
 * @package Inspirium\BookManagement\Models
 *
 * @property $first_name
 * @property $last_name
 * @property $image
 */
class Author extends Model {
    use MetaTrait, SoftDeletes;

    protected $meta_model = 'Inspirium\BookManagement\Models\AuthorModelMeta';

    protected $fillable = ['first_name', 'last_name', 'image'];

    protected $dates = ['deleted_at'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'author_book', 'author_id','book_id');
    }
}
