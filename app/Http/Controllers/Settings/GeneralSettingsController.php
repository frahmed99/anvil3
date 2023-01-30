<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSettings::all();
        $logo = GeneralSettings::where('key', 'logo')->first()->value;
        return view('backend.pages.settings.general.index',             [
            'codes' => Currency::rates()->latest()->get()
        ], compact('generalSettings', 'logo'),);
    }

    public function update(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'companyName' => 'required|string|max:30',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'emailAddress' => 'required|string|email|max:80',
            'phoneNumber' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'customerPrefix' => 'required|string|min:2|max:5',
            'vendorPrefix' => 'required|string|min:2|max:5',
            'quotationPrefix' => 'required|string|min:2|max:5',
            'invoicePrefix' => 'required|string|min:2|max:5',
            'adjustmentPrefix' => 'required|string|min:2|max:5',
            'copyright' => 'required|string|max:100',
            // 'invoiceNote' => 'required|string|max:100',
            // 'quotationNote' => 'required|string|max:100',
            // 'transferPrefix' => 'required|string|min:2|max:5',
            // 'reversalPrefix' => 'required|string|min:2|max:5',
            'TPIN' => 'required|digits:10'
        ]);

        // Update company records
        $data = [
            'companyName' => $request->input('companyName'),
            'emailAddress' => $request->input('emailAddress'),
            'phoneNumber' => $request->input('phoneNumber'),
            'address' => $request->input('address'),
            'customerPrefix' => $request->input('customerPrefix'),
            'vendorPrefix' => $request->input('vendorPrefix'),
            'quotationPrefix' => $request->input('quotationPrefix'),
            'defaultCurrency' => $request->input('defaultCurrency'),
            'invoicePrefix' => $request->input('invoicePrefix'),
            'adjustmentPrefix' => $request->input('adjustmentPrefix'),
            'copyright' => $request->input('copyright'),
            'invoiceNote' => $request->input('invoiceNote'),
            'quotationNote' => $request->input('quotationNote'),
            'transferPrefix' => $request->input('transferPrefix'),
            'reversalPrefix' => $request->input('reversalPrefix'),
            'TPIN' => $request->input('TPIN'),
        ];

        foreach ($data as $key => $value) {
            GeneralSettings::updateorcreate(['key' => $key], ['value' => $value]);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            $image->move($destinationPath, $name);

            // Save image name to database
            GeneralSettings::where('key', 'logo')->update(['value' => $name]);
        }

        smilify('success', 'Company Updated Successfully');
        return redirect()->back();
    }
}
