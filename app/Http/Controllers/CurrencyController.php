<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency as CurrencyModel;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('backend.pages.settings.currency.index');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:currencies|max:255',
            'code' => 'required|unique:currencies|max:255',
            'symbol' => 'required|unique:currencies|max:255',
            'status' => 'required',
        ]);

        CurrencyModel::add($request->name, $request->code, $request->symbol, $request->status);

        return redirect()->route('currencies.index')->with('success', 'Currency created successfully');
    }
    public function autocomplete(Request $request)
    {
        $search = $request->get('term');

        $result = CurrencyModel::search($search)->get();

        return response()->json($result);
    }
}
