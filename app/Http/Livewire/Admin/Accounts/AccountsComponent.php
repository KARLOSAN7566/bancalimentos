<?php

namespace App\Http\Livewire\Admin\Accounts;

use App\Account;
use App\EconomicActivity;
use App\Partner;
use App\PartnersActivity;
use App\PartnersAddress;
use App\PartnersNote;
use App\PartnersPhone;
use App\PopulationGroup;
use App\Site;
use Livewire\Component;

class AccountsComponent extends Component
{
    public $partnerId,
        $type = '1',
        $searchPartnerField, $partner = [], $accounts = [], $phones=[], $activities=[], $addresses=[], $notes=[];

    public function render()
    {
        $populationGroups = PopulationGroup::all();
        $sites = Site::all();
        $ciiu=EconomicActivity::all();
        return view('livewire.admin.accounts.accounts-component', [
            'populationGroups' => $populationGroups,
            'sites' => $sites,
            'ciiu'=>$ciiu
        ]);
    }

    public function searchPartner()
    {
        $this->validate([
            'searchPartnerField' => 'required|numeric'
        ], [
            'searchPartnerField.required' => 'Ingrese un número de identificación',
            'searchPartnerField.numeric' => 'El número de identificación debe ser numerico',
        ]);

        if ($this->type == '1') {
            $result = Partner::where('identification', '=', $this->searchPartnerField)
                ->where('type', '=', 'natural')
                ->first();
        } else if ($this->type == '2') {
            $result = Partner::where('identification', '=', $this->searchPartnerField)
                ->where('type', '=', 'juridica')
                ->first();
        }

        if ($result != '') {
            $this->partner = $result;
            $this->phones=PartnersPhone::where('partner_id','=',$this->partner->id)->get();
            $this->addresses=PartnersAddress::where('partner_id','=',$this->partner->id)->get();
            $this->activities=PartnersActivity::where('partner_id','=',$this->partner->id)->get();
            $this->notes=PartnersNote::where('partner_id','=',$this->partner->id)->get();
            $this->accounts = Account::where('partner_id', '=', $this->partner->id)->get();
            $this->emit('alert', ['type' => 'success', 'message' => 'Aliado seleccionado correctamente.']);
        } else {
            $this->partner = [];
            $this->emit('alert', ['type' => 'error', 'message' => 'Aliado no encontrado.']);
        }
    }

    public function updateType($id)
    {
        $this->type = $id;
        $this->searchPartnerField = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
