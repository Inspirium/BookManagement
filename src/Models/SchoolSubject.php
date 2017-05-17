<?php
/**
 *
 * Filename: SchoolSubject.php
 *
 * User: mbanusic
 * Date: 16/05/2017
 * Time: 15:37
 *
 * Contact: http://mbanusic.com
 * License: GPL-2.0+
 */

namespace Inspirium\BookManagement\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolSubject
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 * @property $group_id
 */
class SchoolSubject extends Model {

    protected $table = 'school_subjects';

    protected $fillable = ['name', 'group_id'];

    public function group() {
        $this->belongsTo('Inspirium\BookManagement\Models\SchoolSubjectGroup');
    }

    public function books() {
        $this->belongsToMany('Inspirium\BookManagement\Models\Book', 'book_school_subject_pivot', 'subject_id', 'book_id');
    }
}
