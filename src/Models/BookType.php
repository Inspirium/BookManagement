<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookType
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 * @property $designation
 * @property $group_id
 */
class BookType extends Model {

    protected $table = 'book_types';

    protected $fillable = ['name', 'designation', 'group_id'];

    protected $visible = ['id', 'name', 'designation'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_type_pivot', 'type_id', 'book_id');
    }

    public function group() {
        $this->belongsTo('Inspirium\BookManagement\Models\BookTypeGroup');
    }
}
