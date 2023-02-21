<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('backend.pages.settings.subcategory.index', compact('subcategories'));
    }
}
