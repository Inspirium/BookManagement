<?php

namespace Inspirium\BookManagement\Controllers\Api;

use App\Http\Controllers\Controller;
use Inspirium\BookManagement\Models\BookBiblioteca;
use Inspirium\BookManagement\Models\BookCategory;
use Inspirium\BookManagement\Models\BookTypeGroup;
use Inspirium\BookManagement\Models\SchoolSubjectGroup;
use Inspirium\BookManagement\Models\SchoolType;

class CategoryController extends Controller {

    public function getCategories() {
        $categories = BookCategory::where('parent', 0)->get()->keyBy('id');
        return response()->json($categories);
    }

    public function getTypes() {
        $groups = BookTypeGroup::all()->keyBy('id');
        return response()->json($groups);
    }

    public function getSchools() {
        $schools = SchoolType::all()->keyBy('id');
        return response()->json($schools);
    }

    public function getSchoolSubjects() {
        $subjects = SchoolSubjectGroup::all()->keyBy('id');
        return response()->json($subjects);
    }

    public function getBibliotecas() {
        $subjects = BookBiblioteca::all()->keyBy('id');
        return response()->json($subjects);
    }
}
