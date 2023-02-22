<?php

namespace App\Http\Livewire\Admin\Partners;

use App\EconomicActivity;
use App\PopulationGroup;
use Livewire\Component;

class PartnersComponent extends Component
{
    public $phones = [], $phone, $addresses = [], $address, $activities = [], $activity;

    public function render()
    {
        $economicActivities=EconomicActivity::all();
        $populationGroups=PopulationGroup::all();
        return view('livewire.admin.partners.partners-component',[
            'economicActivities'=>$economicActivities,
            'populationGroups'=>$populationGroups
            
        ]);
    }

    public function store(){
        
    }


    public function addPhone()
    {
        $this->validate(
            [
                'phone' => 'required|numeric'
            ],
            [],
            [
                'phone' => 'teléfono'
            ]
        );
        array_push($this->phones, $this->phone);
        $this->phone = '';
    }

    public function removePhone($value)
    {
        if (($key = array_search($value, $this->phones)) !== false) {
            unset($this->phones[$key]);
            $this->phones = array_values($this->phones);
        }
    }

    public function addAddress()
    {
        $this->validate(
            [
                'address' => 'required'
            ],
            [],
            [
                'address' => 'dirección'
            ]
        );
        array_push($this->addresses, $this->address);
        $this->address = '';
    }

    public function removeAddress($value)
    {
        if (($key = array_search($value, $this->addresses)) !== false) {
            unset($this->addresses[$key]);
            $this->addresses = array_values($this->addresses);
        }
    }

    public function addActivity()
    {
        $this->validate(
            [
                'activity' => 'required'
            ],
            [],
            [
                'activity' => 'actividad económica'
            ]
        );
        array_push($this->activities, $this->activity);
        $this->activity = '';
    }

    public function removeActivity($value)
    {
        if (($key = array_search($value, $this->activities)) !== false) {
            unset($this->activities[$key]);
            $this->activities = array_values($this->activities);
        }
    }

    public function hydrate()
    {
        $this->emit('select2');
    }
}
