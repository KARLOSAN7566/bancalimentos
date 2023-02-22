<?php

namespace App\Http\Livewire\Admin\Partners;

use App\EconomicActivity;
use App\Partner;
use App\PopulationGroup;
use App\Site;
use Livewire\Component;

class PartnersComponent extends Component
{
    public $siteId, $group, $family, $sector, $class, $genere, $birthday, $identification, 
    $lastname, $firtsname;
    public $phones = [],
        $phone,
        $addresses = [],
        $address,
        $activities = [],
        $activity;

    
        

    public function render()
    {
        $economicActivities = EconomicActivity::all();
        $populationGroups = PopulationGroup::all();
        $siteId = Site ::all();

        return view('livewire.admin.partners.partners-component', [
            'economicActivities' => $economicActivities,
            'populationGroups' => $populationGroups,
            //'siteId'=> $siteId;

        ]);
    }

    public function store()
    {
        $this->validate([
            'firtsname'=> 'required',
            'lastname'=> 'required',
            'identification'=> 'required',
            'birthday'=> 'required',
            'genere'=> 'required',
            'class'=> 'required',
            'sector'=> 'required',
            'family'=> 'required',
            'group'=> 'required',
            'siteId'=> 'required'

        ],[],[
            'firtsname'=> 'nombres',
            'lastname'=> 'apellidos',
            'identification'=> 'identificacion',
            'birthday'=> 'cumpleaños',
            'genere'=> 'genero',
            'class'=> 'estrato',
            'sector'=> 'sector',
            'family'=> 'familiares',
            'group'=> 'grupo',
            'siteId'=> 'ciudad'
        ]);

        $partner=new Partner();
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
