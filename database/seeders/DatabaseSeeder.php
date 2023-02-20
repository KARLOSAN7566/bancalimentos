<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DataTypesTableSeeder;
use Database\Seeders\VoyagerDatabaseSeeder;
use Database\Seeders\PermissionsTableSeeder;
use Database\Seeders\PermissionRoleTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CitiesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(TraslationsTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VoyagerDatabaseSeeder::class);
    }
}
