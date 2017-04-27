<?php

namespace Inspirium\BookManagement\Controllers;

use App\Http\Controllers\Controller;
use Inspirium\BookManagement\Models\Author;

class AuthorController extends Controller {

    public function showAuthors() {
        $elements = Author::all();
        $columns = [
            'first_name' => 'First Name',
            'last_name' => 'Last Name'
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

    }
}
