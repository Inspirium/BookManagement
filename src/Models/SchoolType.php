<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolType
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 * @property $designation
 * @property $order
 */
class SchoolType extends Model {
    protected $table = 'school_types';

    protected $fillable = ['name', 'designation', 'order'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_school_type_pivot', 'school_id', 'book_id');
    }
}
