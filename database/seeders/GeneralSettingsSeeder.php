<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSettings::insert(
            [
                0 => [
                    'id' => 1,
                    'key' => 'companyName',
                    'displayName' => 'Company Name',
                    'value' => 'Your Company',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                1 => [
                    'id' => 2,
                    'key' => 'emailAddress',
                    'displayName' => 'Email Address',
                    'value' => 'youremail@gmail.com',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                2 => [
                    'id' => 3,
                    'key' => 'phoneNumber',
                    'displayName' => 'Phone Number',
                    'value' => '+260960000000',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                3 => [
                    'id' => 4,
                    'key' => 'address',
                    'displayName' => 'Address',
                    'value' => 'Your Address',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                4 => [
                    'id' => 5,
                    'key' => 'customerPrefix',
                    'displayName' => 'Customer Prefix',
                    'value' => 'CUST',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                5 => [
                    'id' => 6,
                    'key' => 'vendorPrefix',
                    'displayName' => 'Vendor Prefix',
                    'value' => 'VEND',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                6 => [
                    'id' => 7,
                    'key' => 'quotationPrefix',
                    'displayName' => 'Quotation Prefix',
                    'value' => 'QUO',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                7 => [
                    'id' => 8,
                    'key' => 'invoicePrefix',
                    'displayName' => 'Invoice Prefix',
                    'value' => 'INV',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                8 => [
                    'id' => 9,
                    'key' => 'adjustmentPrefix',
                    'displayName' => 'Adjustment Prefix',
                    'value' => 'AIA',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                9 => [
                    'id' => 10,
                    'key' => 'defaultCurrency',
                    'displayName' => 'Default Currency',
                    'value' => '1',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                10 => [
                    'id' => 11,
                    'key' => 'logo',
                    'displayName' => 'Logo',
                    'value' => 'no-logo.png',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                11 => [
                    'id' => 12,
                    'key' => 'copyright',
                    'displayName' => 'Copyright',
                    'value' => 'Copyright',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                12 => [
                    'id' => 13,
                    'key' => 'invoiceNote',
                    'displayName' => 'Invoice Note',
                    'value' => 'Your Invoice Notes',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                13 => [
                    'id' => 14,
                    'key' => 'quotationNote',
                    'displayName' => 'Quotation Note',
                    'value' => 'Your Quotation Notes',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                14 => [
                    'id' => 15,
                    'key' => 'transferPrefix',
                    'displayName' => 'Transfer Prefix',
                    'value' => 'TRN',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                15 => [
                    'id' => 16,
                    'key' => 'reversalPrefix',
                    'displayName' => 'Reversal Prefix',
                    'value' => 'RVS',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                16 => [
                    'id' => 17,
                    'key' => 'TPIN',
                    'displayName' => 'TPIN',
                    'value' => '1234567890',
                    'created_at' => null,
                    'updated_at' => null,
                ],
            ]
        );
    }
}
