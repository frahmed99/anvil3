<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\ChartOfAccounts;
use Illuminate\Support\Facades\DB;
use App\Models\ChartOfAccountsTypes;
use Illuminate\Support\Facades\Auth;
use App\Models\ChartOfAccountsSubtypes;
use Illuminate\Support\Facades\Validator;

class ChartOfAccountsController extends Controller
{
    public function index()
    {
        $types = ChartOfAccountsTypes::all();
        $subtypes = ChartOfAccountsSubtypes::all();
        $accounts = ChartOfAccounts::all();
        return view('backend.pages.chartofaccounts.index', compact('types', 'subtypes', 'accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:chart_of_accounts',
            'code' => 'nullable',
            'chart_of_accounts_subtypes_id' => 'required',
            'description' => 'nullable',
        ]);

        ChartOfAccounts::create([
            'name' => $request->name,
            'code' => $request->code,
            'chart_of_accounts_subtypes_id' => $request->chart_of_accounts_subtypes_id,
            'description' => $request->description,
        ]);

        smilify('success', 'Chart of Account Created Successfully');
        return redirect()->route('chartofaccounts.index');
    }

    public function destroy($id)
    {
        $chartOfAccounts = ChartOfAccounts::find($id);
        $chartOfAccounts->delete();
        smilify('success', 'Account Deleted Successfully');
        return redirect()->route('chartofaccounts.index');
    }

    public function fetchChartOfAccounts(Request $request)
    {
        $sel = ChartOfAccounts::find($request->id);
        return response()->json($sel);
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
                'editName' => 'required|max:255',
                'editCode' => 'nullable|digits:3|numeric',
                'editSubtypeId' => 'required',
                'editDescription' => 'nullable',
            ],
            [
                'editName.required' => 'The Account Name Is Required',
                'editSubtypeId.required' => 'The Account Name Is Required',
                'editCode.numeric' => 'Account Code Must Be a Number',
                'editCode.digits' => 'Account Code must be three digits or less',
                'editSubtypeId.required' => 'Account Type Is Required',
            ]
        );
        $arr["name"] = $request->editName;
        $arr["code"] = $request->editCode;
        $arr["chart_of_accounts_subtypes_id"] = $request->editSubtypeId;
        $arr["description"] = $request->editDescription;
        $upd = DB::table("chart_of_accounts")->where("id", $request->idChartOfAccounts)->update($arr);
        smilify('success', ' Account Updated');
        echo json_encode(['status' => $upd ? 1 : 0]);
    }
}
