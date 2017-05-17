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
        $this->hasMany('Inspirium\BookManagement\Models\Book', 'biblioteca_id');
    }
}
