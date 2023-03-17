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
            'chartOfAccountsName' => 'required|string|max:255|unique:chart_of_accounts,name',
            'chartOfAccountsCode' => 'nullable|string|max:255',
            'chart_of_accounts_subtypes_id' => 'required|numeric',
            'chartOfAccountsDescription' => 'nullable',
        ], [
            'chartOfAccountsName.required' => 'Name cannot be blank',
            'chartOfAccountsName.unique' => 'Chart Of Account Already Taken',
            'chartOfAccountsName.max' => 'Name is too long',
            'chart_of_accounts_subtypes_id.numeric' => 'Please select a Category '
        ]);

        ChartOfAccounts::create([
            'name' => $request->chartOfAccountsName,
            'code' => $request->chartOfAccountsCode,
            'chart_of_accounts_subtypes_id' => $request->chart_of_accounts_subtypes_id,
            'description' => $request->chartOfAccountsDescription,
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
        return response()->json(['status' => $upd ? 1 : 0]);
    }
}
