<?php

namespace Database\Seeders;

use App\Models\ChartOfAccountsSubtypes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChartOfAccountsSubtypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChartOfAccountsSubtypes::insert(
            [
                0 => [
                    'id' => 1,
                    'name' => 'Money in Transit',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track the balance of money that is expected to deposited or withdrawn into or from a Cash and Bank account at a future date, usually within days. Examples of this are credit card sales that have been processed but have not yet been deposited into your bank, or checks (written or received) that have not been deposited into or withdrawn from your bank account yet.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Expected Payments from Customers',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track the balance of what customers owe you after you have made a sale. Invoices in Wave are already tracked in the Accounts Receivable category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                2 => [
                    'id' => 3,
                    'name' => 'Inventory',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track the value of physical items you have in storage or in a retail store that are waiting to be sold/completed.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                3 => [
                    'id' => 4,
                    'name' => 'Property, Plant, Equipment',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Things you own but you do not sell to customers as part of your normal business operations.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                4 => [
                    'id' => 5,
                    'name' => 'Depreciation and Amortization',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track the decrease in value of things you own. For example, when you purchase equipment for business, it loses its value as time goes on. These categories always have a balance less than zero (negative).',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                5 => [
                    'id' => 6,
                    'name' => 'Vendor Prepayments and Vendor Credits',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track the value of the product or service that a vendor still needs to provide to you because you have made upfront payments to them. Examples of this are when you make upfront payments for insurance in the beginning of the year or for multiple years, or when a vendor gives you a credit note. The balance of the category will decrease over time as the vendor needs to provide less and less product or service to you.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                6 => [
                    'id' => 7,
                    'name' => 'Other Short-Term Asset',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track amounts that you are owed this year when none of the other asset account types apply. Other Long-Term Asset accounts are used to track amounts that you are owed after this year. These accounts will appear in the Other Current Assets section of the balance sheet.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                7 => [
                    'id' => 8,
                    'name' => 'Other Long-Term Asset',
                    'chart_of_accounts_types_id' => '1',
                    'description' => 'Use this to track amounts that you are owed after this year when none of the other asset account types apply. Other Short-Term Asset accounts are used to track amounts that you are owed this year. These accounts will appear in the Long-term Assets section of the balance sheet.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                8 => [
                    'id' => 9,
                    'name' => 'Credit Card',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track purchases made using a credit card. Create an account for each credit card you use in your business. Purchases using your credit card, and payments to your credit card, should be recorded in the relevant credit card category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                9 => [
                    'id' => 10,
                    'name' => 'Loan and Line of Credit',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track the balance of outstanding loans or withdrawals you\'ve made using a line of credit. The cash you receive as a result of a loan or line of credit is deposited into a Cash and Bank category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                10 => [
                    'id' => 11,
                    'name' => 'Expected Payments to Vendors',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track the balance of what you owe vendors (i.e. suppliers, online subscriptions providers) after you accepted their service or receive items for which you have not yet paid. Bills in Wave are already tracked in the Accounts Payable category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                11 => [
                    'id' => 12,
                    'name' => 'Due For Payroll',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track all amounts owed that relate to having employees and running a payroll. This includes salaries, wages, and employee reimbursements, but also all payroll taxes that must be paid to government agencies and other collectors (ie; insurance agencies and health savings providers).',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                12 => [
                    'id' => 13,
                    'name' => 'Due to You and Other Business Owners',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track the balance of what you (or your partners) have personally loaned to the business, but expect to be paid back for. The same category can also be used to track loans the business has given you (or your partners), in which case the balance would be less than zero (negative).',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                13 => [
                    'id' => 14,
                    'name' => 'Customer Prepayments and Customer Credits',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track the value of the product or service that you still need to provide to a customer because they made upfront payments to you. An example is when a customer gives you a deposit or a retainer, or when you give a customer a credit note. The balance of the category will decrease over time as you provide the product or service to the customer.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                14 => [
                    'id' => 15,
                    'name' => 'Other Short-Term Liability',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track amounts that you owe this year when none of the other liability account types apply. Other Long-Term Liability accounts are used to track amounts that you owe after this year. These accounts will appear in the Current Liabilities section of the balance sheet.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                15 => [
                    'id' => 16,
                    'name' => 'Other Long-Term Liability',
                    'chart_of_accounts_types_id' => '2',
                    'description' => 'Use this to track amounts that you owe after this year when none of the other liability account types apply. Other Short-Term Liability accounts are used to track amounts that you owe this year. These accounts will appear in the Long-term Liabilities section of the balance sheet.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                16 => [
                    'id' => 17,
                    'name' => 'Operating Expense',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'Use this to track most of your business expenses. Each type of office, insurance, rent, utilities, and subscription fees can have a category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                17 => [
                    'id' => 18,
                    'name' => 'Cost of Goods Sold',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'Use this to track expenses that are directly attributable to the product or service you are selling. If there is a type of expense that cannot be attributable to sales, then you should create an Operating Expense category instead.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                18 => [
                    'id' => 19,
                    'name' => 'Payment Processing Fee',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'Use this to track the fees charged when your customer makes a credit card payment. Even though this is usually deducted from the transfer or deposit into your bank account, you should still be recording this type of expense.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                19 => [
                    'id' => 20,
                    'name' => 'Payroll Expense',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'Use this to track expenses related to running and approving a payroll for salaried and hourly employees. Do not use these categories to track payments to yourself, unless you are an employee of the business.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                20 => [
                    'id' => 21,
                    'name' => 'Uncategorized Expense',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'This account is used as the default category for new withdrawal transactions.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                21 => [
                    'id' => 22,
                    'name' => 'Loss On Foreign Exchange',
                    'chart_of_accounts_types_id' => '3',
                    'description' => 'This account is used to track losses due to exchange rate differences on foreign currency invoices, bills, and transfers.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                22 => [
                    'id' => 23,
                    'name' => 'Income',
                    'chart_of_accounts_types_id' => '4',
                    'description' => 'Use this to track all your sales to customers, whether your customer has made a payment or not. These are the categories used when you create an Invoice in Wave. Any sales taxes charged to customers will not be tracked using a Sales category, but will be tracked using a Sales Taxes on Sales or Purchases category.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                23 => [
                    'id' => 24,
                    'name' => 'Discount',
                    'chart_of_accounts_types_id' => '4',
                    'description' => 'Use this to track discounts you\'ve given to customers so that you can determine if you are giving too many discounts. Discounts reduce your income, which is why it will be shown as a negative on the Profit and Loss report.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                24 => [
                    'id' => 25,
                    'name' => 'Other Income',
                    'chart_of_accounts_types_id' => '4',
                    'description' => 'Use this to track all other income that is outside of your regular business operations of selling to your customers. For example, if your main business is as a photographer, but you rented your camera to a friend as a one-off shoot, that could be other income.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                25 => [
                    'id' => 26,
                    'name' => 'Uncategorized Income',
                    'chart_of_accounts_types_id' => '4',
                    'description' => 'This account is used as the default category for new deposit transactions.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                26 => [
                    'id' => 27,
                    'name' => 'Gain On Foreign Exchange',
                    'chart_of_accounts_types_id' => '4',
                    'description' => 'This account is used to track gains due to exchange rate differences on foreign currency invoices, bills, and transfers.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                27 => [
                    'id' => 28,
                    'name' => 'Business Owner Contribution and Drawing',
                    'chart_of_accounts_types_id' => '5',
                    'description' => 'Use this to track money you or others have invested into the business. For example, when you first start a business you usually invest start-up money into it.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                28 => [
                    'id' => 29,
                    'name' => 'Retained Earnings: Profit',
                    'chart_of_accounts_types_id' => '5',
                    'description' => 'Use this to track money that you have taken out of the business.',
                    'created_at' => null,
                    'updated_at' => null,
                ],
            ]
        );
    }
}
