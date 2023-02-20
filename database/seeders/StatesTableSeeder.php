<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Nariño',
                'country_id' => 1,
                'created_at' => '2023-02-14 10:28:38',
                'updated_at' => '2023-02-16 09:52:12',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Tulcán2',
                'country_id' => 2,
                'created_at' => '2023-02-14 10:29:03',
                'updated_at' => '2023-02-17 10:56:35',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Ipiales',
                'country_id' => 1,
                'created_at' => '2023-02-15 09:07:13',
                'updated_at' => '2023-02-15 09:07:13',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'maracaibo',
                'country_id' => 4,
                'created_at' => '2023-02-15 09:07:29',
                'updated_at' => '2023-02-15 15:51:37',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'lima',
                'country_id' => 5,
                'created_at' => '2023-02-15 09:07:42',
                'updated_at' => '2023-02-15 09:07:42',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'arica',
                'country_id' => 6,
                'created_at' => '2023-02-15 09:07:51',
                'updated_at' => '2023-02-15 15:53:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Nariño',
                'country_id' => 1,
                'created_at' => '2023-02-16 17:39:54',
                'updated_at' => '2023-02-16 17:39:54',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'Quito',
                'country_id' => 2,
                'created_at' => '2023-02-17 09:02:20',
                'updated_at' => '2023-02-17 09:02:20',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}