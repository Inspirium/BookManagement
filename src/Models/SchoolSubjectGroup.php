<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolSubjectGroup
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 */
class SchoolSubjectGroup extends Model {

    protected $table = 'school_subject_groups';

    protected $fillable = ['name'];

    protected $visible = ['id', 'name', 'subjects'];
    protected $appends = ['subjects'];

    public function children() {
        return $this->hasMany('Inspirium\BookManagement\Models\SchoolSubject', 'group_id');
    }

    public function getSubjectsAttribute() {
        return $this->attributes['subjects'] = $this->getRelationValue('children')->keyBy('id');
    }
}
