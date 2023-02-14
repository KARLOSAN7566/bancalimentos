<?php

namespace App\Http\Livewire\Admin\Settings;

use App\State;
use Livewire\Component;

class StatesComponent extends Component
{
    public $states, $name, $stateId, $searchName;

    public $countryId;

    public function mount($id){
        $this->countryId= $id;
    }

    public function render()
    {
        $this->states = State::when($this->searchName, function($query, $searchName){
            return $query->where('name', 'like', '%'.$searchName. '%');
        })
        ->where('country_id','=',$this->countryId)
        ->get();

        return view('livewire.admin.settings.states-component');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
        ], [], [
            'name'=> 'nombre'
        ]);
        $state=new State();
        $state->name= $this->name;
        $state->country_id=$this->countryId;//
        $state->save();

        $this->resetInputFields();

        $this->emit('close-modal'); // Close model to using to jquery

    }
    public function edit($id){
        $this->stateId= $id;
        $state=State::find($id);
        if ($state != '') {
            $this->name=$state->name;
        }
    }

    public function update(){
        $state=State::find($this->stateId);
        $state->name= $this->name;
        $state->update();

        $this->resetInputFields();

        $this->emit('close-modal');
    }
    public function delete($id){
        $this->stateId= $id;
    }
    public function destroy (){
        $state=State::find($this->stateId);
        $state->delete();
        $this->resetInputFields();

        $this->emit('close-modal');
    }
    public function resetInputFields(){
        $this->name='';
        $this->stateId='';
    }
    public function cancel(){
        $this->resetInputFields();

        $this->emit('close-modal');
    }

}
