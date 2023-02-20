<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pasto',
                'country_id' => 1,
                'state_id' => 2,
                'created_at' => '2023-02-14 15:57:31',
                'updated_at' => '2023-02-16 09:52:33',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'carchi2',
                'country_id' => 2,
                'state_id' => 3,
                'created_at' => '2023-02-15 15:51:18',
                'updated_at' => '2023-02-17 09:18:05',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'margarita',
                'country_id' => 4,
                'state_id' => 5,
                'created_at' => '2023-02-15 15:51:50',
                'updated_at' => '2023-02-15 15:51:50',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'lima',
                'country_id' => 5,
                'state_id' => 6,
                'created_at' => '2023-02-15 15:52:17',
                'updated_at' => '2023-02-15 15:52:17',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'parinacota',
                'country_id' => 6,
                'state_id' => 7,
                'created_at' => '2023-02-15 15:53:20',
                'updated_at' => '2023-02-15 15:53:20',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'pasto',
                'country_id' => 1,
                'state_id' => 2,
                'created_at' => '2023-02-16 17:42:34',
                'updated_at' => '2023-02-16 17:42:34',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}