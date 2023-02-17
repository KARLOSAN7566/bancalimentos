<?php

namespace App\Http\Livewire\Admin\Settings;

use App\City;
use Livewire\Component;

class CitiesComponent extends Component
{
    public $cities, $name, $cityId, $searchName;

    public $countryId, $stateId;

    public function mount($country, $state)
    {
        $this->countryId = $country;
        $this->stateId = $state;
    }

    public function render()
    {
        $this->cities = City::when($this->searchName, function ($query, $searchName) {
            return $query->where('name', 'like', '%' . $searchName . '%');
        })
            ->where('state_id', '=', $this->stateId)
            ->get();

        return view('livewire.admin.settings.cities-component');
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required|unique:countries,name',
            ],
            [],
            ['name' => 'nombre']
        );

        $city = new City();
        $city->name = $this->name;
        $city->state_id = $this->stateId; //
        $city->country_id = $this->countryId; //
        $city->save();

        $this->resetInputFields();

        $this->emit('close-modal'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->cityId = $id;
        $city = City::find($id);
        if ($city != '') {
            $this->name = $city->name;
        }
    }

    public function update()
    {

        $this->validate(
            [
                'name' => 'required|unique:countries,name,' . $this->cityId,
            ],[],[
                'name' => 'ciudad'
            ]);

        $city = City::find($this->cityId);
        $city->name = $this->name;
        $city->update();

        $this->resetInputFields();

        $this->emit('close-modal');
    }

    public function delete($id)
    {
        $this->cityId = $id;
    }

    public function destroy()
    {
        $city = City::find($this->cityId);
        $city->delete();
        $this->resetInputFields();

        $this->emit('close-modal');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->cityId = '';
    }

    public function cancel()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->emit('close-modal');
    }
}
