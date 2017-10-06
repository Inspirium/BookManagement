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

    protected $appends = ['subjects'];

	public function books() {
		return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'school_subjects_pivot', 'school_subject_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'school_subjects_pivot', 'school_subject_id');
	}

	public function parent() {
		return $this->belongsTo('Inspirium\BookManagement\Models\SchoolSubject');
	}

	public function children() {
		return $this->hasMany('Inspirium\BookManagement\Models\SchoolSubject', 'parent_id');
	}

	public function getSubjectsAttribute() {
		return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
	}
}
