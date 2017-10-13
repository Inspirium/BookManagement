<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\BookManagement\Models\BookBiblioteca
 *
 * @property int $id
 * @property string $name
 * @property string $designation
 * @property string $code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\BookManagement\Models\BookBiblioteca whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BookBiblioteca extends Model {
    protected $table = 'book_bibliotecas';

    protected $fillable = ['name', 'designation', 'code'];

    public function books() {
        return $this->morphedByMany('Inspirium\BookManagement\Models\Book', 'connection', 'bliblioteca_pivot', 'biblioteca_id');
    }

    public function propositions() {
    	return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'biblioteca_pivot', 'biblioteca_id');
    }
}
