<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product_Services;

class ProductServicesController extends Controller
{
    public function index()
    {
        $products = Product_Services::all();
        return view('backend.pages.products&services.index', compact('products'));
    }

    public function create()
    {
        $taxes = Tax::all();
        $categories = Category::all();
        $units = Unit::all();
        return view('backend.pages.products&services.create', compact('taxes', 'categories', 'units'));
    }
}
