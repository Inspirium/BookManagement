<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookTypeGroup
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 */
class BookTypeGroup extends Model {
    protected $table = 'book_type_groups';

    protected $fillable = ['name'];

    public function children() {
        $this->hasMany('Inspirium\BookManagement\Models\BookType', 'group_id');
    }
}
