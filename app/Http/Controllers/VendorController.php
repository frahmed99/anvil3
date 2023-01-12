<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Helpers\Helper;


class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.pages.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('backend.pages.vendors.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $rules = [
            'name' => 'required|max:255',
            'email' => 'email|unique:vendors',
            'contact' => 'regex:/^([0-9\s\-\+\(\)]*)$/',
            'taxId' => 'digits:10',
            'email' => 'unique:vendors,email',
        ];
        $messages = [
            'name.required' => 'The Vendor Name Is Required',
            'email.unique' => 'The email is already taken',
            'tax.digits' => 'TPIN must be 10 digits',
        ];
        $request->validate($rules, $messages);
        $vendor = new Vendor();
        $vendor->name = $data['name'];
        $vendor->company = $data['company'];
        $vendor->contact = $data['contact'];
        $vendor->email = $data['email'];
        $vendor->taxId = $data['taxId'];
        $vendor->billingAddress = $data['billingAddress'];
        $vendor->shippingAddress = $data['shippingAddress'];
        $vendorId = Helper::IDGenerator(new Vendor, 'vendorId', 'VEND', 6);
        $vendor->vendorId = $vendorId;
        $vendor->save();
        smilify('success', 'Vendor Added Successfully');

        return redirect()->route('vendor.index');
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.pages.vendors.show')->with('vendor', $vendor);
    }
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.pages.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:vendors',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'taxId' => 'required|digits:10',
            'email' => 'required',
        ]);
        $vendor->name = $request->name;
        $vendor->company = $request->company;
        $vendor->contact = $request->contact;
        $vendor->email = $request->email;
        $vendor->taxId = $request->taxId;
        $vendor->billingAddress = $request->billingAddress;
        $vendor->shippingAddress = $request->shippingAddress;
        $vendor->save();
        smilify('success', 'Vendor Updated Successfully');
        return redirect()->route('vendor.index');
    }
    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        smilify('success', 'Vendor Deleted Successfully');
        return redirect()->route('vendor.index');
    }
}
