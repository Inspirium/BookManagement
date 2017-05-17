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

    public function subjects() {
        $this->hasMany('Inspirium\BookManagement\Models\SchoolSubject', 'group_id');
    }
}
