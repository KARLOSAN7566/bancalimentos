<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'carlos',
                'last_name' => 'sanchez',
                'identification_type' => 'cc',
                'identification_number' => '123456987',
                'gender' => 'm',
                'address' => 'calle2',
                'city_id' => 1,
                'phone' => '456987',
                'whatsapp' => '789654123',
                'email' => 'kers@hotmail.com',
                'user_id' => NULL,
                'created_at' => '2023-02-15 15:40:54',
                'updated_at' => '2023-02-16 14:43:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'first_name' => 'carlos',
                'last_name' => 'Beltran',
                'identification_type' => 'cc',
                'identification_number' => '987456321',
                'gender' => 'f',
                'address' => 'calle2',
                'city_id' => 1,
                'phone' => '54545454',
                'whatsapp' => '45454545',
                'email' => 'gfdg@hotmail.com',
                'user_id' => NULL,
                'created_at' => '2023-02-16 14:25:35',
                'updated_at' => '2023-02-16 14:26:04',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'first_name' => 'jauna',
                'last_name' => 'bosco',
                'identification_type' => 'ti',
                'identification_number' => '96547852',
                'gender' => 'f',
                'address' => 'cra 5',
                'city_id' => 3,
                'phone' => '258789',
                'whatsapp' => '321452',
                'email' => 'juana@gmail.com',
                'user_id' => NULL,
                'created_at' => '2023-02-17 08:57:25',
                'updated_at' => '2023-02-17 08:57:25',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}