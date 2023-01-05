<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(
            [
                [
                    'name' => 'Accounting Fees',
                    'description' => 'Accounting or bookkeeping services for your business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Advertising & Promotion',
                    'description' => 'Advertising or other costs to promote your business. Includes web or social media promotion.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Bank Service Charges',
                    'description' => 'Fees you pay to your bank like transaction charges, monthly charges, and overdraft charges.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Bad Debts Expense',
                    'description' => 'When a receivable is deemed to be uncollectible, it should be recognized as an expense.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Computer - Hardware',
                    'description' => 'Desktop or laptop computers, mobile phones, tablets, and accessories used for your business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Computer - Hosting',
                    'description' => 'Fees for web storage and access, like hosting your business website or app.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Computer - Internet',
                    'description' => 'Internet services for your business. Does not include data access for mobile devices.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Computer - Software',
                    'description' => 'Apps, software, and web or cloud services you use for business on your mobile phone or computer. Includes one-time purchases and subscriptions.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Cost Of Sales',
                    'description' => '',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Depreciation Expense',
                    'description' => '',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Dues & Subscriptions',
                    'description' => 'Fees or dues you pay to professional, business, and civic organizations. Does not include business licenses and permits or business memberships.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Education & Training',
                    'description' => 'Education and training for yourself or your staff that directly relates to your business, including annual courses to maintain a professional designation, or required safety certifications.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Insurance - General Liability',
                    'description' => 'Premiums that insure your business for things like general liability or workers compensation.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Insurance - Vehicles',
                    'description' => 'Insurance for the vehicle you use for business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Interest Expense',
                    'description' => 'Interest your business pays on loans and other forms of debt, including business loans, credit cards, mortgages, and vehicle payments.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Loss In Foreign Exchange',
                    'description' => 'Foreign exchange losses happen when the exchange rate between your business\'s home currency and a foreign currency transaction changes and results in a loss.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Meals & Entertainment',
                    'description' => 'Food and beverages you consume while conducting business, with clients and vendors, or entertaining customers. ',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Office Supplies',
                    'description' => 'Office supplies and services for your business office or space.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Payroll - Employee Benefits',
                    'description' => 'State deductions taken from an employee\'s pay, like employment insurance.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Payroll - Employer\'s Share Of Benefits',
                    'description' => 'The portion of State obligations your business is responsible for paying as an employer.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Payroll - Salary & Wages',
                    'description' => 'Wages and salaries paid to your employees.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Professional Fees',
                    'description' => 'Fees you pay to consultants or trained professionals for advice or services related to your business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Rent Expense',
                    'description' => 'Costs to rent or lease property or furniture for your business office space. Does not include equipment rentals.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Repairs & Maintenance',
                    'description' => 'Repair and upkeep of property or equipment, as long as the repair doesn\'t add value to the property. Does not include replacements or upgrades.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Telephone - Landline',
                    'description' => 'Land line phone services for your business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Telephone - Wireless',
                    'description' => 'Mobile phone services for your business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Travel Expense',
                    'description' => 'Transportation and travel costs while traveling for business. Does not include daily commute costs.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Uncategorised Expense',
                    'description' => 'A business cost you haven\'t categorized yet. Categorize it now to keep your records accurate. ',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Utilities',
                    'description' => 'Utilities (electricity, water, etc.) for your business office. Does not include phone use.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Vehicle - Fuel',
                    'description' => 'Gas and fuel costs when driving for business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Vehicle - Repairs & Maintenance',
                    'description' => 'Repairs and preventative maitenance of the vehicle you drive for business.',
                    'type' => 'Expense Accounts'
                ],
                [
                    'name' => 'Accounts Recievable',
                    'description' => 'Money your business is owed by customers for products or services you\'ve provided.',
                    'type' => 'Asset Accounts'
                ],
                [
                    'name' => 'Accounts Payable',
                    'description' => 'Money your business owes to suppliers.',
                    'type' => 'Liability Accounts'
                ],
                [
                    'name' => 'Owner Investment / Drawings',
                    'description' => 'Owner investment represents the amount of money or assets you put into your business, either to start the business or keep it running. An owner\'s draw is a direct withdrawal from business cash or assets for your personal use.',
                    'type' => 'Equity Accounts'
                ],
                [
                    'name' => 'Owner\'s Equity',
                    'description' => 'Owner\'s equity is what remains after you subtract business liabilities from business assets. In other words, it\'s what\'s left over for you if you sell all your assets and pay all your debts.',
                    'type' => 'Equity Accounts'
                ],
                [
                    'name' => 'Consulting Income',
                    'description' => 'Money your business receives by providing consulting services to your customers.',
                    'type' => 'Income Accounts'
                ],
                [
                    'name' => 'Gain on Foreign Exchange',
                    'description' => 'Foreign exchange gains happen when the exchange rate between your business\'s home currency and a foreign currency transaction changes and results in a gain.',
                    'type' => 'Income Accounts'
                ],
                [
                    'name' => 'Sales',
                    'description' => 'Payments from your customers for products and services that your business sold.',
                    'type' => 'Income Accounts'
                ],
                [
                    'name' => 'Uncategorised Income',
                    'description' => 'Income you haven\'t categorized yet. Categorize it now to keep your records accurate. ',
                    'type' => 'Income Accounts'
                ],
            ]
        );
    }
}
