<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'administrador',
                'email' => 'admin@bancalimentos.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$o6NodTb34UomE/3rTpNcfuHss1Y98rr8LgyMrj969dYT0IWnmbCSK',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2023-02-13 21:21:37',
                'updated_at' => '2023-02-13 21:21:37',
            ),
        ));
        
        
    }
}