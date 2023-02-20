<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Colombia',
                'created_at' => NULL,
                'updated_at' => '2023-02-16 10:42:34',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ecuador',
                'created_at' => '2023-02-13 17:48:28',
                'updated_at' => '2023-02-13 17:48:28',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Venezuela',
                'created_at' => '2023-02-14 09:20:41',
                'updated_at' => '2023-02-14 09:20:41',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Perú',
                'created_at' => '2023-02-14 09:26:37',
                'updated_at' => '2023-02-14 09:26:37',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Chile',
                'created_at' => '2023-02-14 09:26:46',
                'updated_at' => '2023-02-14 09:26:46',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}