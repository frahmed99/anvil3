<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tax;
use App\Models\Customer;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Models\QuotationNumber;
use App\Models\Product_Services;
use AmrShawky\LaravelCurrency\Facade\Currency;

class QuotationController extends Controller
{
    public function index()
    {
        return view('backend.pages.quotations.index');
    }

    public function create()
    {
        $taxes = Tax::all();
        $customers = Customer::all();
        $quotationPrefix = GeneralSettings::where('key', 'quotationPrefix')->first()->value;
        $quotationNumber = QuotationNumber::where('prefix', $quotationPrefix)->first();
        $lastNumber = $quotationNumber ? $quotationNumber->lastNumber : 0;
        $issueDate = Carbon::now()->format('d-m-Y');
        $validTill = Carbon::now()->format('d-m-Y');
        $products = Product_Services::with('taxes')->get();
        $codes = Currency::rates()->latest()->get();
        $defaultCurrency = GeneralSettings::where('key', 'defaultCurrency')->first()->value;
        return view('backend.pages.quotations.create', compact('taxes', 'customers', 'quotationPrefix', 'lastNumber', 'quotationNumber', 'issueDate', 'validTill', 'products', 'codes', 'defaultCurrency'));
    }

    public function getProductDetails(Request $request)
    {
        $productId = $request->input('productId');
        $product = Product_Services::with('taxes')->find($productId);
        $unit = $product->unit;
        $taxes = $product->taxes;
        $taxNames = $taxes->pluck('name')->implode(', ');
        $subtotal = $product->salePrice;
        $description = $product->description;

        return response()->json([
            'unit' => $unit,
            'taxNames' => $taxNames,
            'salePrice' => $subtotal,
            'description' => $description,
        ]);
    }



    public function store(Request $request)
    {
    }
}
