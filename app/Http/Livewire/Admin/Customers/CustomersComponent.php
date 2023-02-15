<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Customer;
use Livewire\Component;

class CustomersComponent extends Component
{
    public $customers, $first_name, $last_name, $identification_type, $identification_number,
    $gender, $address, $city_id, $phone, $whatsapp, $email, $user_id ;

    public function render()
    {
        $this->customers = Customer::get();

        return view('livewire.admin.customers.customers-component');
    }

    public function store(){
        // Close model to using to jquery

    }
    
}
