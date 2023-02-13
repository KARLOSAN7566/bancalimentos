<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Country;
use Livewire\Component;



class CountriesComponent extends Component
{
    //definir variables, countries para guardar lista y name el nombre del pais
    public $countries, $name;

    public function render()
    {
        $this->countries = Country::all();
        
        return view('livewire.admin.settings.countries-component');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
        ], [], [
            'name'=> 'nombre'
        ]);
        $country=new Country();
        $country->name= $this->name;
        $country->save();

        $this->resetInputFields();

        $this->emit('close-modal'); // Close model to using to jquery

    }
    public function resetInputFields(){
        $this->name='';
    }
    public function cancel(){
        $this->resetInputFields();

        $this->emit('close-modal');
    }

}
