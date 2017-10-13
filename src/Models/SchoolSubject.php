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
 * Inspirium\BookManagement\Models\SchoolSubject
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property int|null $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\BookManagement\Models\SchoolSubject[] $children
 * @property-read mixed $subjects
 * @property-read \Inspirium\BookManagement\Models\SchoolSubject|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\SchoolSubject whereUpdatedAt($value)
 * @mixin \Eloquent
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
