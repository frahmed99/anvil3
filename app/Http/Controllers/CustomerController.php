<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\Helper;


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

    public function store(Request $request)
    {
        $data = $request->input();
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'taxId' => 'required|digits:10',
            'email' => 'required|unique:customers,email',
        ];
        $messages = [
            'name.required' => 'The Customer Name Is Required',
            'email.required' => 'The Customer email is required',
            'email.unique' => 'The email is already taken',
            'contact.required' => 'The Customer Phone is required',
            'tax.digits' => 'TPIN must be 10 digits',
        ];
        $request->validate($rules, $messages);
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->company = $data['company'];
        $customer->contact = $data['contact'];
        $customer->email = $data['email'];
        $customer->taxId = $data['taxId'];
        $customer->billingAddress = $data['billingAddress'];
        $customer->shippingAddress = $data['shippingAddress'];
        $customerId = Helper::IDGenerator(new Customer, 'customerId', 'CUST', 6);
        $customer->customerId = $customerId;
        $customer->save();
        smilify('success', 'Customer Updated Successfully');

        return redirect()->route('customer.index');
    }

    public function show($id)
    {
        $customer = customer::find($id);
        return view('backend.pages.customers.show')->with('customer', $customer);
    }
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('backend.pages.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'taxId' => 'required|digits:10',
            'email' => 'required',
        ]);
        $customer->name = $request->name;
        $customer->company = $request->company;
        $customer->contact = $request->contact;
        $customer->email = $request->email;
        $customer->taxId = $request->taxId;
        $customer->billingAddress = $request->billingAddress;
        $customer->shippingAddress = $request->shippingAddress;
        $customer->save();
        smilify('success', 'Customer Updated Successfully');
        return redirect()->route('customer.index');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        smilify('success', 'Customer Deleted Successfully');
        return redirect()->route('customer.index');
    }
}
