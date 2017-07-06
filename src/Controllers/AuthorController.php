<?php

namespace Inspirium\BookManagement\Controllers;

use App\Http\Controllers\Controller;
use Inspirium\BookManagement\Models\Author;

class AuthorController extends Controller {

    public function showAuthors() {
        $elements = Author::all();
        $columns = [
            'first_name' => [ 'title' => 'First Name' ],
            'last_name' => [ 'title' => 'Last Name' ]
        ];
        $strings = [
            "title" => "Authors",
            "add_new" => "Add New Author",
        ];
        $links = [
            'add_new' => url('book/author/edit'),
            'edit' => url('book/author/edit/'),
            'delete' => url('book/author/delete/'),
            'show' => url('book/author/show')
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showAuthor($id) {
    	$author = Author::firstOrFail($id);
		return view(config('app.template') . '::books.authors.show', ['author' => $author]);
    }

    public function editAuthor($id = null) {
		$author = Author::firstOrNew($id);
		return view(config('app.template') . '::books.authors.edit', ['author' => $author]);
    }
}
