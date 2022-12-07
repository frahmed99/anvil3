<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('backend.pages.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.pages.customers.create');
    }
}
