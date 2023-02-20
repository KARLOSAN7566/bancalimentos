<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Escritorio',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2023-02-13 21:19:59',
                'updated_at' => '2023-02-13 16:27:48',
                'route' => 'voyager.dashboard',
                'parameters' => 'null',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Almacenamiento',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => '#000000',
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2023-02-13 21:19:59',
                'updated_at' => '2023-02-13 16:31:45',
                'route' => 'voyager.media.index',
                'parameters' => 'null',
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Usuarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => '#000000',
                'parent_id' => 11,
                'order' => 1,
                'created_at' => '2023-02-13 21:19:59',
                'updated_at' => '2023-02-13 16:30:55',
                'route' => 'voyager.users.index',
                'parameters' => 'null',
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 11,
                'order' => 2,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:00',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Herramientas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-20 08:53:49',
                'route' => NULL,
                'parameters' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => '#000000',
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:33',
                'route' => 'voyager.menus.index',
                'parameters' => 'null',
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Base de Datos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => '#000000',
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:29',
                'route' => 'voyager.database.index',
                'parameters' => 'null',
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:45',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:33',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Configuraciones',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => 5,
                'order' => 6,
                'created_at' => '2023-02-13 21:20:00',
                'updated_at' => '2023-02-13 16:31:39',
                'route' => 'voyager.settings.index',
                'parameters' => 'null',
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 1,
                'title' => 'Gest.de Usuarios',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-people',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2023-02-13 16:30:35',
                'updated_at' => '2023-02-13 16:30:48',
                'route' => NULL,
                'parameters' => '',
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 1,
                'title' => 'Paises',
                'url' => '/admin/countries',
                'target' => '_self',
                'icon_class' => 'voyager-location',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2023-02-13 16:50:56',
                'updated_at' => '2023-02-13 16:51:10',
                'route' => NULL,
                'parameters' => '',
            ),
            12 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Clientes',
                'url' => '/admin/customers',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => '#000000',
                'parent_id' => 11,
                'order' => 3,
                'created_at' => '2023-02-14 16:33:24',
                'updated_at' => '2023-02-20 08:53:33',
                'route' => NULL,
                'parameters' => '',
            ),
            13 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Sedes',
                'url' => '/admin/sities',
                'target' => '_self',
                'icon_class' => 'voyager-paper-plane',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2023-02-17 15:50:45',
                'updated_at' => '2023-02-20 08:53:33',
                'route' => NULL,
                'parameters' => '',
            ),
            14 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Materiales',
                'url' => '/admin/materials',
                'target' => '_self',
                'icon_class' => 'voyager-truck',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2023-02-20 08:53:09',
                'updated_at' => '2023-02-20 08:53:49',
                'route' => NULL,
                'parameters' => '',
            ),
        ));
        
        
    }
}