<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model {

    protected $table = 'book_categories';

    protected $fillable = ['name', 'description', 'level'];

    protected $appends = ['groups'];

    protected $visible = ['id', 'name', 'description', 'groups', 'coefficient'];

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_category_pivot', 'category_id', 'book_id');
    }

    public function parent() {
        return $this->belongsTo('Inspirium\BookManagement\Models\BookCategory');
    }

    public function children() {
        return $this->hasMany('Inspirium\BookManagement\Models\BookCategory', 'parent');
    }

    public function getGroupsAttribute() {
        return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
    }
}
