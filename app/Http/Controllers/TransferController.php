<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::all();
        return view('backend.pages.transfers.index', compact('transfers'));
    }

    public function create()
    {
        $banks  = Bank::all();
        return view('backend.pages.transfers.create', compact('banks'));
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
        $transfer = new Transfer();
        $transfer->accountName = $data['accountName'];
        $transfer->bankName = $data['bankName'];
        $transfer->accountNumber = $data['accountNumber'];
        $transfer->openingBalance = $data['openingBalance'];
        $transfer->contact = $data['contact'];
        $transfer->address = $data['address'];
        $transfer->save();
        smilify('success', 'Transfer Updated Successfully');
        return redirect()->route('transfer.index');
    }

    public function edit($id)
    {
        $transfer = Transfer::find($id);
        return view('backend.pages.transfers.edit', compact('transfer'));
    }
    public function update(Request $request, $id)
    {
        $transfer = Transfer::find($id);
        $request->validate([
            'accountName' => 'required|max:255',
            'bankName' => 'required|max:255',
            'accountNumber' => 'required|max:255',
            'openingBalance' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'contact' => 'regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        $transfer->accountName = $request->accountName;
        $transfer->bankName = $request->bankName;
        $transfer->accountNumber = $request->accountNumber;
        $transfer->openingBalance = $request->openingBalance;
        $transfer->contact = $request->contact;
        $transfer->address = $request->address;
        $transfer->save();
        smilify('success', 'Transfer Updated Successfully');
        return redirect()->route('transfer.index');
    }

    public function destroy($id)
    {
        $transfer = Transfer::find($id);
        $transfer->delete();
        smilify('success', 'Transfer Deleted Successfully');
        return redirect()->route('transfer.index');
    }
}
