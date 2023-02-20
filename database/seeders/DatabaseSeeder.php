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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
    }
}
