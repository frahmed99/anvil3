<?php

namespace App\Http\Controllers\Settings;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.settings.taxes.index');
    }
}
