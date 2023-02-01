<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bank;
use App\Helpers\Helper;
use App\Models\Adjustment;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;

class AdjustmentController extends Controller
{
    public function index()
    {
        $adjustments = Adjustment::all();
        $banks = Bank::all();
        return view('backend.pages.adjustments.index', compact('adjustments', 'banks'));
    }


    public function create()
    {
        $banks  = Bank::all();
        return view('backend.pages.adjustments.create', compact('banks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'account' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
            'reason' => 'required'
        ]);
        $account = Bank::find($request->input('account'));
        $amount = $request->input('amount');
        if ($request->input('type') == 'Debit') {
            $account->balance += $amount;
        } else {
            $account->balance -= $amount;
        }
        $account->save();

        $adjustment = new Adjustment();

        $prefix = GeneralSettings::where('key', 'adjustmentPrefix')->first()->value;
        $adjustmentId = Helper::IDGenerator(new Adjustment, 'adjustmentId', $prefix, 6);
        $adjustment->adjustmentId = $adjustmentId;

        $adjustment->bank_id = $request->input('account');
        $adjustment->type = $request->input('type');
        $adjustment->amount = $request->input('amount');
        $adjustment->reason = $request->input('reason');
        $adjustment->date = Carbon::createFromFormat('d-m-Y', $request->date)->toDateString();
        $adjustment->save();

        smilify('success', 'Adjustment Successfully');
        return redirect()->route('adjustment.index');
    }
}
