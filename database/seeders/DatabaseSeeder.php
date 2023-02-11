<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(GeneralSettingsSeeder::class);
        $this->call(TaxSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(ChartOfAccountsTypesSeeder::class);
        $this->call(ChartOfAccountsSubtypesSeeder::class);
        $this->call(ChartOfAccountsSeeder::class);
    }
}
