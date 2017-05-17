<?php

namespace Inspirium\BookManagement\Controllers;

use App\Http\Controllers\Controller;
use Inspirium\BookManagement\Models\BookCategory;

class CategoryController extends Controller {

    public function showCategories() {
        $elements = BookCategory::all();
        $columns = [
            'name' => [ 'title' => 'Name' ],
        ];
        $strings = [
            "title" => "Categories",
            "add_new" => "Add New Category",
        ];
        $links = [
            'add_new' => url('book/category/edit'),
            'edit' => url('book/category/edit/'),
            'delete' => url('book/category/delete/'),
            'show' => url('book/category/show')
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showCategory($id) {

    }

    public function editCategory($id = null) {

    }
}
