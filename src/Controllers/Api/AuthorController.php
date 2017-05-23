<?php

namespace Inspirium\BookManagement\Controllers\Api;

use App\Http\Controllers\Controller;
use Inspirium\BookManagement\Models\Author;

class AuthorController extends Controller {

    public function search($term) {
        $authors = Author::where('first_name', 'LIKE', '%'.$term.'%')->orWhere('last_name', 'LIKE', '%'.$term.'%')->get();
        return response()->json($authors);
    }
}
