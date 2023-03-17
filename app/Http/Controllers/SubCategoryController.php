<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('backend.pages.settings.subcategory.index', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'subcategoryName' => 'required|string|max:255|unique:sub_categories,name',
                'category_id' => 'required|numeric'
            ],
            [
                'subcategoryName.required' => 'Name cannot be blank',
                'subcategoryName.unique' => 'SubCategory Already Taken',
                'subcategoryName.max' => 'Name is too long',
                'category_id.numeric' => 'Please select a Category '
            ]
        );
        SubCategory::create([
            'name' => $request->subcategoryName,
            'category_id' => $request->category_id,
        ]);

        smilify('success', 'SubCategory Added Successfully');
        return redirect()->route('subcategory.index');
    }

    function fetchSubCategory(Request $request)
    {
        $sel = SubCategory::find($request->id);
        return response()->json($sel);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'subcategoryNameEdit' => 'required|string',
            'category_idEdit' => 'required|string'
        ], [
            'subcategoryNameEdit.required' => 'Please enter SubCategory',
            'subcategoryNameEdit.unique' => 'SubCategory Already Taken',
            'subcategoryNameEdit.max' => 'Name is too long',
            'category_idEdit.numeric' => 'Please select a Category '
        ]);

        $subCategory = SubCategory::findOrFail($request->idSubCategory);
        $subCategory->fill($request->only('subcategoryNameEdit', 'category_idEdit'));
        $subCategory->save();

        smilify('success', 'SubCategory Updated');
        return response()->json(['status' => 1]);
    }
}
