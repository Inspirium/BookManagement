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
    protected $with = ['children'];
    protected $appends = ['groups'];
    protected $visible = ['name', 'id', 'groups'];

    public function children() {
        return $this->hasMany('Inspirium\BookManagement\Models\BookType', 'group_id');
    }

    public function getGroupsAttribute() {
        return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
    }
}
