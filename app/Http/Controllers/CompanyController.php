<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    public function index()
    {

        return view('backend.pages.settings.company.index');
    }
}
