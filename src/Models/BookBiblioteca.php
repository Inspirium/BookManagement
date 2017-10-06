<?php

namespace Inspirium\BookManagement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookBiblioteca
 * @package Inspirium\BookManagement\Models
 *
 * @property $id
 * @property $name
 * @property $designation
 * @property $code
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
