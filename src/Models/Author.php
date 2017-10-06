<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Author
 * @package Inspirium\BookManagement\Models
 *
 * @property $first_name
 * @property $last_name
 * @property $image
 */
class Author extends Model {
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'image'];

    protected $dates = ['deleted_at'];

    protected $visible = ['id', 'first_name', 'last_name', 'image', 'name'];

    protected $appends = ['name'];

	public function books() {
		return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'author_pivot', 'author_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'author_pivot', 'author_id');
	}

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImageAttribute() {
        return 'https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg';
    }
}
