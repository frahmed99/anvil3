<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Unit;
use App\Models\Category;
use App\Models\ChartOfAccounts;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Models\Product_Services;

class ProductServicesController extends Controller
{
    public function index()
    {
        $products = Product_Services::with(['category', 'subCategory'])->get();
        $defaultCurrency = GeneralSettings::where('key', 'defaultCurrency')->value('value');
        return view('backend.pages.products&services.index', compact('products', 'defaultCurrency'));
    }

    public function create()
    {
        $taxes = Tax::all();
        $categories = Category::all();
        $subcategories = SubCategory::with('category')->get();
        $units = Unit::all();
        $incomeAccounts = ChartOfAccounts::where('chart_of_accounts_subtypes_id', 23)->get();
        $expenseAccounts = ChartOfAccounts::whereIn('chart_of_accounts_subtypes_id', [17, 18])->orderBy('name')->get();
        $defaultCurrency = GeneralSettings::where('key', 'defaultCurrency')->value('value');
        return view('backend.pages.products&services.create', compact('taxes', 'categories', 'units', 'defaultCurrency', 'subcategories', 'expenseAccounts', 'incomeAccounts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'salePrice' => 'nullable|numeric',
            'purchasePrice' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'taxes' => 'nullable|array',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'type' => 'nullable|required|in:product,service',
            'unit_id' => 'nullable|integer|exists:units,id',
            'income_account_id' => 'nullable|integer|exists:chart_of_accounts,id',
            'expense_account_id' => 'nullable|integer|exists:chart_of_accounts,id',
        ]);
        $productService = new Product_Services();
        $productService->name = $data['name'];
        $productService->sku = $data['sku'];
        $productService->salePrice = $data['salePrice'] ?? 0.0;
        $productService->purchasePrice = $data['purchasePrice'] ?? 0.0;
        $productService->quantity = $data['quantity'] ?? 0;
        $productService->description = $data['description'];
        $productService->type = $data['type'];
        $productService->unit_id = $data['unit_id'];
        $productService->income_account_id = $data['income_account_id'] ?: null;
        $productService->expense_account_id = $data['expense_account_id'] ?: null;
        $category = Category::findOrFail($data['category_id']);
        $productService->category()->associate($category);
        $subcategory = Subcategory::findOrFail($data['subcategory_id']);
        $productService->subcategory()->associate($subcategory);
        $productService->save();
        $productService->taxes()->attach($data['taxes'] ?? []);
        smilify('success', 'Product Created Successfully');
        return redirect()->route('productsServices.index');
    }

    public function edit($id)
    {
        $product = Product_Services::find($id);
        $taxes = Tax::all();
        $categories = Category::all();
        $subcategories = SubCategory::with('category')->get();
        $units = Unit::all();
        $incomeAccounts = ChartOfAccounts::where('chart_of_accounts_subtypes_id', 23)->get();
        $expenseAccounts = ChartOfAccounts::whereIn('chart_of_accounts_subtypes_id', [17, 18])->orderBy('name')->get();
        $defaultCurrency = GeneralSettings::where('key', 'defaultCurrency')->value('value');
        return view('backend.pages.products&services.edit', compact('product', 'taxes', 'categories', 'units', 'defaultCurrency', 'subcategories', 'expenseAccounts', 'incomeAccounts'));
    }

    public function update(Request $request, $id)
    {
        $productService = Product_Services::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'salePrice' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/',],
            'purchasePrice' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/',],
            'quantity' => 'nullable|integer',
            'taxes' => 'nullable|array',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'type' => 'required',
            'unit_id' => 'nullable|integer|exists:units,id',
            'income_account_id' => 'nullable|integer|exists:chart_of_accounts,id',
            'expense_account_id' => 'nullable|integer|exists:chart_of_accounts,id',
        ], [
            'name.required' => 'The product name is required.',
            'name.max' => 'The product name may not be greater than :max characters.',
            'sku.max' => 'The product SKU may not be greater than :max characters.',
            'salePrice.numeric' => 'The product sale price must be a numeric value.',
            'purchasePrice.numeric' => 'The product purchase price must be a numeric value.',
            'quantity.integer' => 'The product quantity must be an integer value.',
            'category_id.exists' => 'The selected category is invalid.',
            'sub_category_id.exists' => 'The selected subcategory is invalid.',
            'type.required' => 'The product type is required.',
            'type.in' => 'The selected product type is invalid.',
            'unit_id.exists' => 'The selected unit is invalid.',
            'income_account_id.exists' => 'The selected income account is invalid.',
            'expense_account_id.exists' => 'The selected expense account is invalid.',
        ]);
        $productService->name = $data['name'];
        $productService->sku = $data['sku'];
        $productService->salePrice = $data['salePrice'] ?? 0.0;
        $productService->purchasePrice = $data['purchasePrice'] ?? 0.0;
        $productService->quantity = $data['quantity'] ?? 0;
        $productService->description = $data['description'];
        $productService->type = $data['type'];
        $productService->unit_id = $data['unit_id'];
        $productService->income_account_id = $data['income_account_id'] ?: null;
        $productService->expense_account_id = $data['expense_account_id'] ?: null;
        $category = Category::findOrFail($data['category_id']);
        $productService->category()->associate($category);
        $subcategory = Subcategory::findOrFail($data['sub_category_id']);
        $productService->subcategory()->associate($subcategory);
        $productService->save();
        $productService->taxes()->sync($data['taxes'] ?? []);
        smilify('success', 'Product Updated Successfully');
        return redirect()->route('productsServices.index');
    }

    public function destroy($id)
    {
        $product = Product_Services::find($id);
        $product->delete();
        smilify('success', 'Product/Service Deleted Successfully');
        return redirect()->route('productsServices.index');
    }

    public function taxstore(Request $request)
    {
        $request->validate([
            'taxName' => 'required|string|max:255|unique:taxes,name',
            'taxRate' => 'required|numeric|between:0,100',
        ], [
            'taxName.required' => 'Name cannot be blank',
            'taxRate.required' => 'Rate cannot be blank',
            'taxRate.numeric' => 'Tax must be numeric in percentage form',
        ]);
        $data = new Tax();
        $data->name = $request->taxName;
        $data->rate = $request->taxRate;
        $data->save();

        smilify('success', 'Tax Added Successfully');
        return redirect()->route('productsServices.create');
    }

    public function categorystore(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255|unique:categories,name',
        ], [
            'categoryName.required' => 'Name cannot be blank',
        ]);

        $data = new Category();
        $data->name = $request->categoryName;
        $data->save();

        smilify('success', 'Category Added Successfully');
        return redirect()->route('productsServices.create');
    }

    public function subcategorystore(Request $request)
    {
        $request->validate(
            [
                'subcategoryName' => 'required|string|max:255|unique:sub_categories,name',
                'category_id' => 'required|numeric'
            ],
            [
                'subcategoryName.required' => 'Name cannot be blank',
                'category_id.numeric' => 'Please select a Category '
            ]
        );
        $data = new SubCategory();
        $data->name = $request->subcategoryName;
        $data->category_id = $request->category_id;
        $data->save();

        smilify('success', 'SubCategory Added Successfully');
        return redirect()->route('productsServices.create');
    }
}
