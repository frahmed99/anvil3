<?php

namespace Database\Seeders;

use App\Models\ChartOfAccountsTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ChartOfAccountsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChartOfAccountsTypes::insert(
            [
                0 => [
                    'id' => 1,
                    'name' => 'Assets',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Liabilities',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                2 => [
                    'id' => 3,
                    'name' => 'Expenses',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                3 => [
                    'id' => 4,
                    'name' => 'Income',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                4 => [
                    'id' => 5,
                    'name' => 'Equity',
                    'created_at' => null,
                    'updated_at' => null,
                ],
            ]
        );
    }
}
