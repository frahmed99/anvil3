<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('backend.pages.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('backend.pages.banks.create');
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $rules = [
            'accountName' => 'required|max:255',
            'bankName' => 'required|max:255',
            'accountNumber' => 'required|max:255',
            'openingBalance' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'contact' => 'regex:/^([0-9\s\-\+\(\)]*)$/',
        ];
        $messages = [
            'name.required' => 'The Account Name Is Required',
        ];
        $request->validate($rules, $messages);
        $bank = new Bank();
        $bank->accountName = $data['accountName'];
        $bank->bankName = $data['bankName'];
        $bank->accountNumber = $data['accountNumber'];
        $bank->openingBalance = $data['openingBalance'];
        $bank->contact = $data['contact'];
        $bank->address = $data['address'];
        $bank->save();
        smilify('success', 'Bank Updated Successfully');
        return redirect()->route('bank.index');
    }
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('backend.pages.banks.edit', compact('bank'));
    }
    public function update(Request $request, $id)
    {
        $bank = Bank::find($id);
        $request->validate([
            'accountName' => 'required|max:255',
            'bankName' => 'required|max:255',
            'accountNumber' => 'required|max:255',
            'openingBalance' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'contact' => 'regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        $bank->accountName = $request->accountName;
        $bank->bankName = $request->bankName;
        $bank->accountNumber = $request->accountNumber;
        $bank->openingBalance = $request->openingBalance;
        $bank->contact = $request->contact;
        $bank->address = $request->address;
        $bank->save();
        smilify('success', 'Bank Updated Successfully');
        return redirect()->route('bank.index');
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        smilify('success', 'Bank Deleted Successfully');
        return redirect()->route('bank.index');
    }
}
