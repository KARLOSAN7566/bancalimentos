<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sites')->delete();
        
        \DB::table('sites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'Sede principal, donde recolectan los insumos',
                'address' => 'calle 45 pasto',
                'phones' => '789654123',
                'created_at' => '2023-02-17 17:40:07',
                'updated_at' => '2023-02-17 17:40:17',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'Sede Secudaria, donde se recogen los insumos',
                'address' => 'calle 2, Nariño',
                'phones' => '123654789',
                'created_at' => '2023-02-17 17:41:01',
                'updated_at' => '2023-02-17 17:41:01',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'Sede administrativa',
                'address' => 'parque infantil',
                'phones' => '74125863',
                'created_at' => '2023-02-17 17:42:05',
                'updated_at' => '2023-02-17 17:42:05',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}