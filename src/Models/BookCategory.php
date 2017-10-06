<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model {

    protected $table = 'book_categories';

    protected $fillable = ['name', 'description', 'level'];

    protected $appends = ['groups'];

    public function parent() {
        return $this->belongsTo('Inspirium\BookManagement\Models\BookCategory', 'parent_id');
    }

    public function children() {
        return $this->hasMany('Inspirium\BookManagement\Models\BookCategory', 'parent_id');
    }

    public function getGroupsAttribute() {
        return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
    }

	public function books() {
		$this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'book_category_pivot', 'connection_id', 'book_category_id');
	}

	public function propositions() {
		$this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'book_category_pivot', 'connection_id', 'book_category_id');
	}

}
