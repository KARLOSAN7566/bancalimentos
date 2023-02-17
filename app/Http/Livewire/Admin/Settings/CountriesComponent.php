<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Country;
use Livewire\Component;



class CountriesComponent extends Component
{
    //definir variables, countries para guardar lista y name el nombre del pais

    public $countries, $name, $countryId, $searchName;


    public function render()
    {
        $this->countries = Country::when($this->searchName, function ($query, $searchName) {
            return $query->where('name', 'like', '%' . $searchName . '%');
        })->get();



        return view('livewire.admin.settings.countries-component');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:countries,name',
        ], [], [
            'name' => 'nombre'
        ]);
        $country = new Country();
        $country->name = $this->name;
        $country->save();

        $this->resetInputFields();

        $this->emit('close-modal'); // Close model to using to jquery

    }
    public function edit($id)
    {

        $this->countryId = $id;
        $country = Country::find($id);
        if ($country != '') {
            $this->name = $country->name;
        }
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|unique:countries,name,'.$this->countryId,
        ], [], [
            'name' => 'país'
        ]);
        $country = Country::find($this->countryId);
        $country->name = $this->name;
        $country->update();

        $this->resetInputFields();

        $this->emit('close-modal');
    }

    public function delete($id)
    {
        $this->countryId = $id;
    }
    
    public function destroy()
    {
        $country = Country::find($this->countryId);
        $country->delete();
        $this->resetInputFields();

        $this->emit('close-modal');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->countryId = '';
    }
    public function cancel()
    {

        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->emit('close-modal');
    }
}
