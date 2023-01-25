<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Helpers\Helper;
use App\Models\Transfer;

use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::with(['fromAccount', 'toAccount'])->get();
        return view('backend.pages.transfers.index', compact('transfers'));
    }

    public function create()
    {
        $banks  = Bank::all();
        return view('backend.pages.transfers.create', compact('banks'));
    }
    public function store(Request $request)
    {
        // Validate the data passed in the request
        $request->validate([
            'fromAccount' => 'required',
            'toAccount' => 'required',
            'fromAmount' => 'numeric|required|regex:/^\d+(\.\d{1,2})?$/',
            'toAmount' => 'numeric|required|regex:/^\d+(\.\d{1,2})?$/',
            'date' => 'required|date',
            'reference' => 'required',
        ], [
            'fromAmount.required' => 'Amount cannot be blank',
            'reference.required' => 'Reference cannot be blank',
        ]);

        // Create a new Transfer object and set its properties
        $transfer = new Transfer();
        $transfer->from_account_id = $request->fromAccount;
        $transfer->to_account_id = $request->toAccount;
        $transfer->fromAmount = $request->fromAmount;
        $transfer->rate = $request->rate;
        $transfer->toAmount = $request->toAmount;
        $transfer->date = Carbon::createFromFormat('d-m-Y', $request->date)->toDateString();
        $transfer->reference = $request->reference;
        $transfer->description = $request->description;

        // Save the transfer to the database
        $transfer->save();

        // Update the balance of the bank accounts
        Helper::bankAccountBalance($transfer->from_account_id, $transfer->fromAmount, 'debit');
        Helper::bankAccountBalance($transfer->to_account_id, $transfer->toAmount, 'credit');

        // Redirect the user to the index page with a success message
        smilify('success', 'Transfer Added Successfully');
        return redirect()->route('transfer.index');
    }

    public function edit($id)
    {
        $banks = Bank::all();
        $transfer = Transfer::find($id);
        return view('backend.pages.transfers.edit', compact('transfer', 'banks'));
    }
    public function update(Request $request, $id)
    {
        // Find the transfer with the given id
        $transfer = Transfer::findOrFail($id);

        // Validate the data passed in the request
        $request->validate([
            'reference' => 'required',
        ], [
            'reference.required' => 'Reference cannot be blank',
        ]);

        // Update the reference and description fields of the transfer
        $transfer->reference = $request->reference;
        $transfer->description = $request->description;

        // Save the updated transfer to the database
        $transfer->save();

        // Redirect the user to the index page with a success message
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

    public function rate($currency)
    {
        $rate = Currency::get($currency);
        return response()->json($rate);
    }

    public function reversal($id)
    {
        $originalTransfer = Transfer::find($id);

        //create reversed transfer
        $reversedTransfer = new Transfer();
        $reversedTransfer->from_account_id = $originalTransfer->to_account_id;
        $reversedTransfer->to_account_id = $originalTransfer->from_account_id;
        $reversedTransfer->rate = $originalTransfer->rate;
        $reversedTransfer->fromAmount = $originalTransfer->toAmount;
        $reversedTransfer->toAmount = $originalTransfer->fromAmount;
        $reversedTransfer->date = Carbon::now();
        $reversedTransfer->reversed = 1;

        $reversedTransfer->reference = 'reversed_' . $originalTransfer->reference;
        $reversedTransfer->description = 'Reversed Transfer';
        //dd($reversedTransfer->toAmount, $reversedTransfer->fromAmount,);

        $reversedTransfer->save();

        // Update the balance of the bank accounts
        Helper::bankReversalBalance($reversedTransfer->to_account_id, $reversedTransfer->toAmount, 'credit');
        Helper::bankReversalBalance($reversedTransfer->from_account_id, $reversedTransfer->fromAmount, 'debit');
        smilify('success', 'Transfer Reversed Successfully');
        return redirect()->route('transfer.index');
    }
}
