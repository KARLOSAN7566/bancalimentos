<?php

namespace App\Http\Livewire\Admin\Partners;

use App\Site;
use App\Partner;
use Livewire\Component;
use App\PopulationGroup;
use App\EconomicActivity;

class AddPartnerComponent extends PartnersComponent
{
    public function render()
    {
        $economicActivities = EconomicActivity::all();
        $populationGroups = PopulationGroup::all();
        $sites = Site::all();
        $partners= Partner::all();

        return view('livewire.admin.partners.add-partner-component',[
            'economicActivities' => $economicActivities,
            'populationGroups' => $populationGroups,
            'sites' => $sites,
            'partners' => $partners
        ]);
    }
}
