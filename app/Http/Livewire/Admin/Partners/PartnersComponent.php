<?php

namespace App\Http\Livewire\Admin\Partners;

use App\Site;
use App\Partner;
use Livewire\Component;
use App\PopulationGroup;
use App\EconomicActivity;
use Illuminate\Support\Facades\Auth;

class PartnersComponent extends Component
{
    public $siteId, $group, $family, $sector, $class, $genere, $birthday, $identification, 
    $lastname, $firstname, $partnerId, $site_id, $type;
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
        $sites = Site::all();
        $partners= Partner::all();

        return view('livewire.admin.partners.partners-component', [
            'economicActivities' => $economicActivities,
            'populationGroups' => $populationGroups,
            'sites' => $sites,
            'partners' => $partners

        ]);
    }

    public function store()
    {
        $this->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'identification'=> 'required',
            'birthday'=> 'required',
            'genere'=> 'required',
            'class'=> 'required',
            'sector'=> 'required',
            'family'=> 'required',
            'group'=> 'required',
            'site_id'=> 'required',
            'type'=> 'required'

        ],[],[
            'firstname'=> 'nombres',
            'lastname'=> 'apellidos',
            'identification'=> 'identificacion',
            'birthday'=> 'cumpleaños',
            'genere'=> 'genero',
            'class'=> 'estrato',
            'sector'=> 'sector',
            'family'=> 'familiares',
            'group'=> 'grupo',
            'site_id'=> 'ciudad',
            'type'=> 'tipo cuenta'
        ]);

        $partner=new Partner();
        $partner->firstname= $this->firstname;
        $partner->lastname= $this->lastname;
        $partner->identification= $this->identification;
        $partner->birthday= $this->birthday;
        $partner->genere= $this->genere;
        $partner->class= $this->class;
        $partner->sector= $this->sector;
        $partner->family= $this->family;
        $partner->group= $this->group;
        $partner->site_id= $this->site_id;
        $partner->type= $this->type;
        $partner->created_user_id= Auth::user()->id;
        $partner->updated_user_id= Auth::user()->id;

        $partner->save();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function resetInputFields()
    {
        $this->firstname= '';
        $this->lastname= '';
        $this->identification= '';
        $this->birthday= '';
        $this->genere= '';
        $this->class= '';
        $this->sector= '';
        $this->family= '';
        $this->group= '';
        $this->site_id= '';
        $this->type= '';
    }

    public function update()
    {
        $this->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'identification'=> 'required',
            'birthday'=> 'required',
            'genere'=> 'required',
            'class'=> 'required',
            'sector'=> 'required',
            'family'=> 'required',
            'group'=> 'required',
            'site_id'=> 'required',
            'type'=> 'required'

        ],[],[
            'firstname'=> 'nombres',
            'lastname'=> 'apellidos',
            'identification'=> 'identificacion',
            'birthday'=> 'cumpleaños',
            'genere'=> 'genero',
            'class'=> 'estrato',
            'sector'=> 'sector',
            'family'=> 'familiares',
            'group'=> 'grupo',
            'site_id'=> 'ciudad',
            'type'=> 'tipo cuenta'
        ]);

        $partner= Partner::find($this->partnerId);
        $partner->firstname= $this->firstname;
        $partner->lastname= $this->lastname;
        $partner->identification= $this->identification;
        $partner->birthday= $this->birthday;
        $partner->genere= $this->genere;
        $partner->class= $this->class;
        $partner->sector= $this->sector;
        $partner->family= $this->family;
        $partner->group= $this->group;
        $partner->site_id= $this->site_id;
        $partner->type= $this->type;
        $partner->created_user_id= Auth::user()->id;
        $partner->updated_user_id= Auth::user()->id;

        $partner->update();
        $this->resetInputFields();
        $this->emit('close-modal');


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

    public function delete($id)
    {
        $this->partnerId=$id;
    }

    public function destroy()
    {
        $partner=Site::find($this->partnerId);
        $partner->delete();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function cancel()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->resetInputFields();
        $this->emit('close-modal');
    }
}
