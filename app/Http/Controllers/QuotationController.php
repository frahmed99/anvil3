<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        return view('backend.pages.quotations.index');
    }

    public function create()
    {
        $customers = Customer::all();
        return view('backend.pages.quotations.create', compact('customers'));
    }
}
