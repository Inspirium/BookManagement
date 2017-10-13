<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\BookManagement\Models\BookType
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property int|null $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\BookManagement\Models\BookType[] $children
 * @property-read mixed $groups
 * @property-read \Inspirium\BookManagement\Models\BookType|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookType whereUpdatedAt($value)
 * @mixin \Eloquent
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
