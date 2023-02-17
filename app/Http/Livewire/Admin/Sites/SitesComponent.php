<?php

namespace App\Http\Livewire\Admin\Sites;
use App\Site;
use Livewire\Component;



class SitesComponent extends Component
{
    public $sites, $description, $address, $phones, $siteId;
    public $updateMode = false;
     

    public function render()
    {
        $this->sites = Site::all();

        return view('livewire.admin.sites.sites-component');
    }

    public function store()
    {
        $this->validate([
            'description'=> 'required',
            'address'=> 'required',
            'phones'=> 'required'
        ],[],[
            'description'=> 'descripcion',
            'address'=> 'direccion',
            'phones'=> 'telefono'
        ]);

        $site=new Site();
        $site->description= $this->description;
        $site->address= $this->address;
        $site->phones= $this->phones;

        $site->save();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function resetInputFields()
    {
        $this->description='';
        $this->address='';
        $this->phones='';
    }
    public function edit($id)
    {
        $this->siteId= $id;
        $site= Site::find($id);
        if ($site !='') {
            $this->description=$site->description;
            $this->address=$site->address;
            $this->phones=$site->phones;
        }
    }
    public function update()
    {
        $this->validate([
            'description'=> 'required',
            'address'=> 'required',
            'phones'=> 'required'
        ],[],[
            'description'=> 'descripcion',
            'address'=> 'direccion',
            'phones'=> 'telefono'
        ]);

        $site=Site::find($this->siteId);
        $site->description= $this->description;
        $site->address= $this->address;
        $site->phones= $this->phones;

        $site->update();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function delete($id)
    {
        $this->siteId=$id;
    }

    public function destroy()
    {
        $site=Site::find($this->siteId);
        $site->delete();
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
