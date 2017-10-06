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

    protected $fillable = ['name', 'designation'];

    protected $appends = ['groups'];

	public function books() {
		return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'book_type_pivot', 'book_type_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'book_type_pivot', 'book_type_id');
	}

	public function parent() {
		return $this->belongsTo('Inspirium\BookManagement\Models\BookType');
	}

	public function children() {
		return $this->hasMany('Inspirium\BookManagement\Models\BookType', 'parent_id');
	}

	public function getGroupsAttribute() {
		return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
	}
}
