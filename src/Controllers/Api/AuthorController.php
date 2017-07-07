<?php

namespace Inspirium\BookManagement\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\BookManagement\Models\Author;

class AuthorController extends Controller {

    public function search($term) {
        $authors = Author::where('first_name', 'LIKE', '%'.$term.'%')->orWhere('last_name', 'LIKE', '%'.$term.'%')->get();
        return response()->json($authors);
    }

    public function postAuthor(Request $request) {
		$author = Author::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'work' => $request->input('work'),
			'occupation' => $request->input('occupation'),
			'title' => $request->input('title')
		]);

		return response()->json($author);
    }
}
