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
		return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'school_type_pivot', 'school_type_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'school_type_pivot', 'school_type_id');
	}
}
