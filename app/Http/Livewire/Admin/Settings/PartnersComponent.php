<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Partner;
use Livewire\Component;

class PartnersComponent extends Component
{
    public $partners, $partnerId, $firstname, $lastname, $identification, $birthday, $genere, $class,
    $sector, $phone, $group, $site_id, $created_user_at, $updated_user_id;
    public $updateMode = false;

    public function render()
    {
        $this->partners=Partner::all();
        
        return view('livewire.admin.settings.partners-component');
    }
}
