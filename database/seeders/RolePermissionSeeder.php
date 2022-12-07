<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'Dashboard',
                'permissions' => [
                    'Show.Dashboard',
                ]
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    // User Permissions
                    'Manage.User',
                    'Create.User',
                    'Edit.User',
                    'Delete.User',
                ]
            ],
            [
                'group_name' => 'System Settings',
                'permissions' => [
                    // Admin Permissions
                    'Manage.SystemSettings',
                ]
            ],
            [
                'group_name' => 'Role',
                'permissions' => [
                    // Role Permissions
                    'Manage.Role',
                    'Create.Role',
                    'Edit.Role',
                    'Delete.Role',
                ]
            ],
            [
                'group_name' => 'Permission',
                'permissions' => [
                    // Role Permissions
                    'Manage.Permission',
                    'Create.Permission',
                    'Edit.Permission',
                    'Delete.Permission',
                ]
            ],
            [
                'group_name' => 'Company Setting',
                'permissions' => [
                    // Company Setting Permissions
                    'Manage.Company Setting',
                ]
            ],
            [
                'group_name' => 'Business Setting',
                'permissions' => [
                    // Business Setting Permissions
                    'Manage.Business Setting',
                ]
            ],
            [
                'group_name' => 'Expense',
                'permissions' => [
                    // Expense Permissions
                    'Manage.Expense',
                    'Create.Expense',
                    'Edit.Expense',
                    'Delete.Expense',
                ]
            ],
            [
                'group_name' => 'Invoice',
                'permissions' => [
                    // Invoice Permissions
                    'Manage.Invoice',
                    'Create.Invoice',
                    'Edit.Invoice',
                    'Delete.Invoice',
                    'Show.Invoice',
                    'Create.Payment Invoice',
                    'Delete.Payment Invoice',
                    'Send.Invoice',
                    'Delete.Invoice Product',
                    'Convert.Invoice',
                    'Duplicate.Invoice',
                ]
            ],
            [
                'group_name' => 'Plan',
                'permissions' => [
                    // Plan Permissions
                    'Manage.Plan',
                    'Create.Plan',
                    'Edit.Plan',
                    'Buy.Plan'
                ]
            ],
            [
                'group_name' => 'Unit',
                'permissions' => [
                    // Unit Permissions
                    'Manage.Unit',
                    'Create.Unit',
                    'Edit.Unit',
                    'Delete.Unit',
                ]
            ],
            [
                'group_name' => 'Tax',
                'permissions' => [
                    // Tax Permissions
                    'Manage.Tax',
                    'Create.Tax',
                    'Edit.Tax',
                    'Delete.Tax',
                ]
            ],
            [
                'group_name' => 'Category',
                'permissions' => [
                    // Category Permissions
                    'Manage.Category',
                    'Create.Category',
                    'Edit.Category',
                    'Delete.Category',
                ]
            ],
            [
                'group_name' => 'Product & Service',
                'permissions' => [
                    // Product & Service Permissions
                    'Manage.Product & Service',
                    'Create.Product & Service',
                    'Edit.Product & Service',
                    'Delete.Product & Service',
                ]
            ],
            [
                'group_name' => 'Customer',
                'permissions' => [
                    // Customer Permissions
                    'Manage.Customer',
                    'Create.Customer',
                    'Edit.Customer',
                    'Delete.Customer',
                    'Show.Customer',
                    'Manage.Customer Payment',
                    'Manage Customer Transaction',
                    'Manage. Customer Invoice',
                ]
            ],
            [
                'group_name' => 'Banking',
                'permissions' => [
                    // Banking Permissions
                    'Manage.Banking',
                    'Create.Banking',
                    'Edit.Banking',
                    'Delete.Banking',
                ]
            ],
            [
                'group_name' => 'Transfer',
                'permissions' => [
                    // Transfer Permissions
                    'Manage.Transfer',
                    'Create.Transfer',
                    'Edit.Transfer',
                    'Delete.Transfer',
                ]
            ],
            [
                'group_name' => 'Payment Method',
                'permissions' => [
                    // Payment Method Permissions
                    'Manage.Payment Method',
                    'Create.Payment Method',
                    'Edit.Payment Method',
                    'Delete.Payment Method',
                ]
            ],
            [
                'group_name' => 'Transaction',
                'permissions' => [
                    // Transaction Permissions
                    'Manage.Transaction',
                ]
            ],
            [
                'group_name' => 'Revenue',
                'permissions' => [
                    // Revenue Permissions
                    'Manage.Revenue',
                    'Create.Revenue',
                    'Edit.Revenue',
                    'Delete.Revenue',
                ]
            ],
            [
                'group_name' => 'Bill',
                'permissions' => [
                    // Bill Permissions
                    'Manage.Bill',
                    'Create.Bill',
                    'Edit.Bill',
                    'Delete.Bill',
                    'Show.Bill',
                    'Delete.Bill Product',
                    'Send.Bill',
                    'Duplicate.Bill'
                ]
            ],
            [
                'group_name' => 'Payment',
                'permissions' => [
                    // Payment Permissions
                    'Manage.Payment',
                    'Create.Payment',
                    'Edit.Payment',
                    'Delete.Payment',
                    'Create.Payment Bill',
                    'Delete.Payment Bill',
                ]
            ],
            [
                'group_name' => 'Order',
                'permissions' => [
                    // Order Permissions
                    'Manage.Order',
                ]
            ],
            [
                'group_name' => 'Report',
                'permissions' => [
                    // Report Permissions
                    'Income.Report',
                    'Expense.Reports',
                    'IncomeVsExpense.Report',
                    'Invoice.Report',
                    'Bill.Report',
                    'Stock.Report',
                    'Tax.Report',
                    'Profit & Loss.Report',
                    'Statement.Report',
                    'Balance Sheet.Report',
                    'Ledger.Report',
                    'Trial Balance.Report',
                ]
            ],
            [
                'group_name' => 'Vendor',
                'permissions' => [
                    // Vendor Permissions
                    'Manage.Vendor',
                    'Create.Vendor',
                    'Edit.Vendor',
                    'Delete.Vendor',
                    'Show.Vendor',
                    'Manage.Vendor Bill',
                    'Manage.Vendor Payment',
                    'Manage.Vendor Transaction',
                ]
            ],
            [
                'group_name' => 'Credit Note',
                'permissions' => [
                    // Credit Note Permissions
                    'Manage.Credit Note',
                    'Create.Credit Note',
                    'Edit.Credit Note',
                    'Delete.Credit Note',
                ]
            ],
            [
                'group_name' => 'Debit Note',
                'permissions' => [
                    // Debit Note Permissions
                    'Manage.Debit Note',
                    'Create.Debit Note',
                    'Edit.Debit Note',
                    'Delete.Debit Note',
                ]
            ],
            [
                'group_name' => 'Quotation',
                'permissions' => [
                    // Quotation Permissions
                    'Manage.Quotation',
                    'Create.Quotation',
                    'Edit.Quotation',
                    'Delete.Quotation',
                    'Show.Quotation',
                    'Send.Quotation',
                    'Duplicate.Quotation',
                    'Delete.Quotation Product',
                ]
            ],
            [
                'group_name' => 'Goal',
                'permissions' => [
                    // Goal Permissions
                    'Manage.Goal',
                    'Create.Goal',
                    'Edit.Goal',
                    'Delete.Goal',
                    'Show.Goal',
                ]
            ],
            [
                'group_name' => 'Assets',
                'permissions' => [
                    // Assets Permissions
                    'Manage.Assets',
                    'Create.Assets',
                    'Edit.Assets',
                    'Delete.Assets',
                    'Show.Assets',
                ]
            ],
            [
                'group_name' => 'Chart Of Accounts',
                'permissions' => [
                    // Chart Of Accounts Permissions
                    'Manage.Chart Of Accounts',
                    'Create.Chart Of Accounts',
                    'Edit.Chart Of Accounts',
                    'Delete.Chart Of Accounts',
                    'Show.Chart Of Accounts',
                ]
            ],
            [
                'group_name' => 'Journal Entry',
                'permissions' => [
                    // Journal Entry Permissions
                    'Manage.Journal Entry',
                    'Create.Journal Entry',
                    'Edit.Journal Entry',
                    'Delete.Journal Entry',
                    'Show.Journal Entry',
                ]
            ],
            [
                'group_name' => 'Chart Of Accounts',
                'permissions' => [
                    // Chart Of Accounts Permissions
                    'Manage.Chart Of Accounts',
                    'Create.Chart Of Accounts',
                    'Edit.Chart Of Accounts',
                    'Delete.Chart Of Accounts',
                    'Show.Chart Of Accounts',
                ]
            ],
            [
                'group_name' => 'Budget Planner',
                'permissions' => [
                    // Budget Planner Permissions
                    'Manage.Budget Planner',
                    'Create.Budget Planner',
                    'Edit.Budget Planner',
                    'Delete.Budget Planner',
                    'Show.Budget Planner',
                ]
            ],
        ];
        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
