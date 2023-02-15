<?php

namespace App\Http\Livewire\Admin\Customers;

use App\City;
use App\Country;
use App\Customer;
use App\State;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class CustomersComponent extends Component
{
    public $customers, $customerId, $firstName, $lastName, $identificationType, $identificationNumber,
    $gender, $address, $cityId, $phone, $whatsapp, $email, $userId, $stateId, $countryId;

    public $countries, $states, $cities;

    public function mount (){
        $this->countries=Country::all();
        $this->states=collect();
        $this->cities=collect();
        //$this->reset->cities;

    }
    public $updateMode = false;

    public function render()
    {
        $this->customers = Customer::get();

        return view('livewire.admin.customers.customers-component');
    }
    public function updatedCountryId($id){
        if ($id!='') {
            $this->states=State::where('country_id', '=', $id)->get();
        }else{
            $this->states=collect();
            $this->cities=collect();
        }
        
        
    }

    public function updatedStateId($id){
        $this->cities=City::where('state_id', '=', $id)->get();
          
        
    }
    
    

    public function store()
    {
        
        $customer=new Customer();
        $customer->first_name= $this->firstName;
        $customer->last_name= $this->lastName;
        $customer->identification_type= $this->identificationType;
        $customer->identification_number= $this->identificationNumber;
        $customer->gender= $this->gender;
        $customer->address= $this->address;
        $customer->city_id= $this->cityId;
        $customer->phone= $this->phone;
        $customer->whatsapp= $this->whatsapp;
        $customer->email= $this->email;

        $customer->save();
        $this->resetInputFields();
        $this->emit('close-modal');

    }
    public function resetInputFields(){
        $this->firstName='';
        $this->lastName='';
        $this->identificationType='';
        $this->identificationNumber='';
        $this->gender='';
        $this->address='';
        $this->cityId='';
        $this->phone='';
        $this->whatsapp='';
        $this->email='';
    }
    public function edit($id){
        $this->customerId= $id;
        $customer=Customer::find($id);
        if ($customer != ''){
        $this->firstName=$customer->first_name;
        $this->lastName=$customer->last_name;
        $this->identificationType=$customer->identification_type;
        $this->identificationNumber=$customer->identification_number;
        $this->gender=$customer->gender;
        $this->address=$customer->address;
        $this->cityId=$customer->city_id;
        $this->phone=$customer->phone;
        $this->whatsapp=$customer->whatsapp;
        $this->email=$customer->email;

        $city=City::find($this->cityId);
        $this->cities= City::where('state_id', '=', $city->state_id)->get();
        
        $state=State::find($city->state_id);
        $this->states=State::where('country_id', '=', $state->country_id)->get();
        $this->stateId=$state->id;
        $this->countryId=$state->country_id;



        }
    }
    public function update(){
        $customer=Customer::find($this->customerId);
        $customer->first_name= $this->firstName;
        $customer->last_name= $this->lastName;
        $customer->identification_type= $this->identificationType;
        $customer->identification_number= $this->identificationNumber;
        $customer->gender= $this->gender;
        $customer->address= $this->address;
        $customer->city_id= $this->cityId;
        $customer->phone= $this->phone;
        $customer->whatsapp= $this->whatsapp;
        $customer->email= $this->email;
        $customer->update();

        $this->resetInputFields();
        $this->emit('close-modal');
    }
    public function delete($id){
        $this->customerId= $id;
    }
    public function destroy (){
        $customer=Customer::find($this->customerId);
        $customer->delete();

        $this->resetInputFields();
        $this->emit('close-modal');
    }
    
    public function cancel(){
        $this->resetInputFields();
        $this->emit('close-modal');
    }
    
}
