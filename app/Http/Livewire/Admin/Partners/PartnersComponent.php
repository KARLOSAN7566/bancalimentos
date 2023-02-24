<?php

namespace App\Http\Livewire\Admin\Partners;

use App\Site;
use App\Partner;
use Livewire\Component;
use App\PopulationGroup;
use App\EconomicActivity;
use App\PartnersActivity;
use App\PartnersAddress;
use App\PartnersNote;
use App\PartnersPhone;
use Illuminate\Support\Facades\Auth;

class PartnersComponent extends Component
{
    public $siteId, $group, $family, $sector, $class, $genere, $birthday, $identification, 
    $lastname, $firstname, $partnerId, $site_id, $type;
    public $phones = [],
        $phonesPartners=[],
        $phone,
        $addresses = [],
        $addressesPartners=[],
        $address,
        $activities = [],
        $activitiesPartners=[],
        $activity,
        $notes = [],
        $notesPartners=[],
        $note,
        $economicActivities=[];

    public function mount(){
        $this->economicActivities = EconomicActivity::all();
        $this->phonesPartners=PartnersPhone::all();
        $this->addressesPartners = PartnersAddress::all();
        $this->activitiesPartners=PartnersActivity::all();
        $this->notesPartners=PartnersNote::all();
    }

    public function render()
    {
        $populationGroups = PopulationGroup::all();
        $sites = Site::all();
        $partners= Partner::all();

        return view('livewire.admin.partners.partners-component', [
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

        if($this->phones!=[]){
            foreach ($this->phones as $phone) {
                $phonePartner=new PartnersPhone();
                $phonePartner->partner_id=$partner->id;
                $phonePartner->phone=$phone;
                $phonePartner->save();
            }
        }
        if ($this->addresses!=[]) {
            foreach ($this->addresses as $address) {
                $addressPartner= new PartnersAddress();
                $addressPartner->partner_id=$partner->id;
                $addressPartner->address=$address;
                $addressPartner->save();
            }
        }

        if ($this->activities!=[]) {
            foreach ($this->activities as $activity) {
                $activityPartner =new PartnersActivity();
                $activityPartner->partner_id=$partner->id;
                $activityPartner->activity_id=$activity->id;/////
                $activityPartner->save();
            }
        }

        if ($this->notes!=[]) {
            foreach ($this->notes as $note) {
                $notePartner = new PartnersNote();
                $notePartner->partner_id=$partner->id;
                $notePartner->note=$note;
                $notePartner->save();
            }
        }

        $this->resetInputFields();
        $this->emit('close-modal');
    }


    public function edit($id)
    {
        $this->partnerId = $id;
        $partner = Partner::find($id);
        if ($partner != '') {
            $this->firstname= $partner->firstname;
            $this->lastname= $partner->lastname;
            $this->identification= $partner->identification;
            $this->birthday= $partner->birthday;
            $this->genere= $partner->genere;
            $this->class= $partner->class;
            $this->sector= $partner->sector;
            $this->family= $partner->family;
            $this->group= $partner->group;
            $this->site_id= $partner->site_id;
            $this->type= $partner->type;

            //Phones
            $phones=PartnersPhone::where('partner_id','=',$partner->id)->get();

            if($phones!=''){
                foreach ($phones as $phone) {
                    array_push($this->phones,$phone->phone);
                }
            }
            
            //Address
            $addresses=PartnersAddress::where('partner_id','=',$partner->id)->get();
            if ($addresses!='') {
                foreach ($addresses as $address) {
                    array_push($this->addresses,$address->address);
                }
            }

            //Activity

            $activities=PartnersActivity::where('partner_id','=',$partner->id)->get();
            if ($activities!='') {
                foreach ($activities as $activity) {
                    array_push($this->activities,$activity->activity_id);
                }
            }

            //Note
            $notes=PartnersNote::where('partner_id','=',$partner->id)->get();
            if ($notes!='') {
                foreach ($notes as $note) {
                    array_push($this->notes,$note->note);
                }
            }    
        }
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

        //PHONES
        $phones=PartnersPhone::where('partner_id','=',$partner->id)->get();

        if($phones!=''){
            foreach ($phones as $phone) {
                PartnersPhone::find($phone->id)->delete();
            }
        }

        if($this->phones!=[]){
            foreach ($this->phones as $phone) {
                $phonePartner=new PartnersPhone();
                $phonePartner->partner_id=$partner->id;
                $phonePartner->phone=$phone;
                $phonePartner->save();
            }
        }
        //Address
        $addresses=PartnersAddress::where('partner_id','=',$partner->id)->get();
        if ($addresses!='') {
            foreach ($addresses as $address) {
                PartnersAddress::find($address->id)->delete();
            }
        }
        if ($this->addresses!=[]) {
            foreach ($this->addresses as $address) {
                $addressPartner= new PartnersAddress();
                $addressPartner->partner_id=$partner->id;
                $addressPartner->address=$address;
                $addressPartner->save();
            }
        }
        //Activity
        $activities=PartnersActivity::where('partner_id','=',$partner->id)->get();
        if ($activities!='') {
            foreach ($activities as $activity) {
                PartnersActivity::find($activity->id)->delete();
            }
        }
        if ($this->activities!=[]) {
            foreach ($this->activities as $activity) {
                $activityPartner =new PartnersActivity();
                $activityPartner->partner_id=$partner->id;
                $activityPartner->activity_id=$activity->id;//////
                $activityPartner->save();
            }
        }
        //Note
        $notes=PartnersNote::where('partner_id','=',$partner->id)->get();
        if ($notes!='') {
            foreach ($notes as $note) {
                PartnersNote::find($note->id)->delete();
            }
        }
        if ($this->notes!=[]) {
            foreach ($this->notes as $note) {
                $notePartner = new PartnersNote();
                $notePartner->partner_id=$partner->id;
                $notePartner->note=$note;
                $notePartner->save();
            }
        }
        $this->resetInputFields();
        $this->emit('close-modal');
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
        $this->phones = [];
        $this->phone;
        $this->addresses = [];
        $this->address;
        $this->activities = [];
        $this->activity;
        $this->notes = [];
        $this->note;
    }

    public function cancel()
    {
        $this->resetErrorBag();
        $this->resetValidation();
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

    public function addNote()
    {
        $this->validate(
            [
                'note'=>'required'
            ],[],
            [
                'note'=>'notas'
            ]
        );
        array_push($this->notes, $this->note);
        $this->note='';
    }

    public function removeNote($value)
    {
        if (($key= array_search($value, $this->notes)) !== false) {
            unset($this->notes[$key]);
            $this->notes = array_values($this->notes);
        }
    }

    public function hydrate()
    {
        $this->emit('select2');
    }
}
