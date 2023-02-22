<?php

namespace App\Http\Livewire\Admin\Accounts;

use App\Partner;
use Livewire\Component;

class AccountsComponent extends Component
{
    public $partnerId,
    $type='1',
    $searchPartnerField,$partner=[];

    public function render()
    {   
        return view('livewire.admin.accounts.accounts-component',[

        ]);
    }

    public function searchPartner(){
        $this->validate([
            'searchPartnerField'=>'required|numeric'
        ],[
            'searchPartnerField.required'=>'Ingrese un número de identificación',
            'searchPartnerField.numeric'=>'El número de identificación debe ser numerico',
        ]);

        $result=Partner::where('identification','=',$this->searchPartnerField)->first();
        
        if($result!=''){
            $this->partner=$result;
            $this->emit('alert', ['type' => 'success', 'message' => 'Aliado seleccionado correctamente.']);
        }else{
            $this->partner=[];
            $this->emit('alert', ['type' => 'error', 'message' => 'Aliado no encontrado.']);
        }
    }

    public function updateType($id){
        $this->type=$id;
        $this->searchPartnerField='';
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
