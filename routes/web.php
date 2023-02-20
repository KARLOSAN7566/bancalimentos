<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Sites\SitesComponent;
use App\Http\Livewire\Admin\Settings\CitiesComponent;
use App\Http\Livewire\Admin\Settings\StatesComponent;
use App\Http\Livewire\Admin\Settings\CountriesComponent;
use App\Http\Livewire\Admin\Settings\MaterialsComponent;
use App\Http\Livewire\Admin\Customers\CustomersComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('countries', CountriesComponent::class);
    Route::get('countries/{country}/states', StatesComponent::class)->name('countries.states');
    Route::get('countries/{country}/states/{state}', CitiesComponent::class)->name('states.cities');
    Route::get('customers', CustomersComponent::class);

    //Sites
    Route::get('sites', SitesComponent::class);
    //Materials
    Route::get('materials', MaterialsComponent::class);
});
