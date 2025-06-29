<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Bank;
use App\Models\Transfer;
use App\Models\Adjustment;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('backend.pages.banks.index', compact('banks'));
    }

    public function create()
    {
        return view(
            'backend.pages.banks.create',
            [
                'codes' => Currency::rates()->latest()->get()
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $rules = [
            'accountName' => 'required|max:255',
            'bankName' => 'nullable|max:255',
            'accountNumber' => 'nullable|max:255',
            'balance' => 'regex:/^\d+(\.\d{1,2})?$/',
            'contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ];
        $messages = [
            'name.required' => 'The Account Name Is Required',
        ];
        $request->validate($rules, $messages);
        $bank = new Bank();
        $bank->accountName = $data['accountName'];
        $bank->bankName = $data['bankName'];
        $bank->currencyCode = $data['currencyCode'];
        $bank->accountNumber = $data['accountNumber'];
        $bank->balance = $data['balance'];
        $bank->contact = $data['contact'];
        $bank->address = $data['address'];
        $bank->save();
        smilify('success', 'Bank Updated Successfully');
        return redirect()->route('bank.index');
    }
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('backend.pages.banks.edit', compact('bank'), [
            'codes' => Currency::rates()->latest()->get()
        ]);
    }
    public function update(Request $request, $id)
    {
        $bank = Bank::find($id);
        $request->validate([
            'accountName' => 'required|max:255',
            'bankName' => 'nullable|required|max:255',
            'accountNumber' => 'nullable|max:255',
            'balance' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        $bank->accountName = $request->accountName;
        $bank->bankName = $request->bankName;
        $bank->currencyCode = $request->currencyCode;
        $bank->accountNumber = $request->accountNumber;
        $bank->balance = $request->balance;
        $bank->contact = $request->contact;
        $bank->address = $request->address;
        $bank->save();
        smilify('success', 'Bank Updated Successfully');
        return redirect()->route('bank.index');
    }

    public function show($id)
    {
        $bank = Bank::find($id);
        $adjustments = Adjustment::where('bank_id', $id)->get();
        $transfers = Transfer::orderBy('date', 'DESC')->where('from_account_id', $id)
            ->orWhere('to_account_id', $id)->get();

        $totalTransactions = $transfers->count() + $adjustments->count();

        $creditAmount = 0;
        $debitAmount = 0;
        foreach ($transfers as $transfer) {
            if ($transfer->from_account_id == $bank->id) {
                $debitAmount += $transfer->fromAmount;
            } else {
                $creditAmount += $transfer->toAmount;
            }
        }
        foreach ($adjustments as $adjustment) {
            if ($adjustment->type == 'Credit') {
                $creditAmount += $adjustment->amount;
            } else {
                $debitAmount += $adjustment->amount;
            }
        }

        $totalTransactionsThisMonth = $transfers->whereBetween('date', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count() + $adjustments->whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();

        $totalTransactionsThisWeek = $transfers->whereBetween('date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count() + $adjustments->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        return view('backend.pages.banks.show', [
            'bank' => $bank,
            'adjustments' => $adjustments,
            'transfers' => $transfers,
            'totalTransactions' => $totalTransactions,
            'creditAmount' => $creditAmount,
            'debitAmount' => $debitAmount,
            'totalTransactionsThisMonth' => $totalTransactionsThisMonth,
            'totalTransactionsThisWeek' => $totalTransactionsThisWeek,
        ]);
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        smilify('success', 'Bank Deleted Successfully');
        return redirect()->route('bank.index');
    }
}
