<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\BookManagement\Models\SchoolType
 *
 * @property int $id
 * @property string $name
 * @property string $designation
 * @property int|null $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolType whereUpdatedAt($value)
 * @mixin \Eloquent
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
