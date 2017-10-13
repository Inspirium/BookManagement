<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Inspirium\BookManagement\Models\Author
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $image
 * @property string|null $title
 * @property string|null $work
 * @property string|null $occupation
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\BookProposition\Models\AuthorExpense[] $expenses
 * @property-read mixed $name
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Author onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\Author whereWork($value)
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Author withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Inspirium\BookManagement\Models\Author withoutTrashed()
 * @mixin \Eloquent
 */
class Author extends Model {
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'image'];

    protected $dates = ['deleted_at'];

    protected $appends = ['name'];

	public function books() {
		return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'author_pivot', 'author_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'author_pivot', 'author_id');
	}

	public function expenses() {
		return $this->hasMany('Inspirium\BookProposition\Models\AuthorExpense', 'author_id');
	}

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImageAttribute() {
        return 'https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg';
    }
}
