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
        $taxes = Tax::all();
        return view('backend.pages.settings.taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|unique:taxes,name',
                'rate' => 'required|numeric|between:0,100',
            ],
            [
                'name.required' => 'The Tax Name Is Required',
                'name.unique' => 'Tax Already Exists',
                'rate.numeric' => 'Tax Rate Must Be a Number in Percentage',
                'rate.required' => 'Tax Value Is Required',
                'rate.numeric' => 'Tax Value Must be and Integer',
                'rate.between:0,100' => 'Tax Value Must Be Between 0 and 100',
            ]
        );

        $data = new Tax();
        $data->name = $request->name;
        $data->rate = $request->rate;
        $data->save();

        smilify('success', 'Tax Added Successfully');
        return redirect()->route('tax.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tax = Tax::find($id);
        $tax->delete();
        return redirect()->route('tax.index');
    }
}
