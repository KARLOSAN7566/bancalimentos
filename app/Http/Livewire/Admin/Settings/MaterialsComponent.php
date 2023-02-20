<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Material;
use Livewire\Component;

class MaterialsComponent extends Component
{
    public $materials, $materialId, $description, $point_for_kilogram, $created_user_id, $updated_user_id;
    public $updateMode = false;

    public function render()
    {
        $this->materials=Material::all();

        return view('livewire.admin.settings.materials-component');
    }

    public function store()
    {
        $this->validate([
            'description'=>'required',
            'point_for_kilogram'=>'required',
            'created_user_id'=>'required',
            'updated_user_id'=>'required'
        ],[],[
            'description'=> 'descripción',
            'point_for_kilogram'=> 'puntos por kilogramo',
            'created_user_id'=> 'creado por:',
            'updated_user_id'=> 'actualizado por:'
        ]);

        $material=new Material();
        $material->description= $this->description;
        $material->point_for_kilogram= $this->point_for_kilogram;
        $material->created_user_id= $this->created_user_id;
        $material->updated_user_id= $this->updated_user_id;

        $material->save();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function resetInputFields()
    {
        $this->description='';
        $this->point_for_kilogram='';
        $this->created_user_id='';
        $this->updated_user_id='';
    }

    public function edit($id)
    {
        $this->materialId=$id;
        $material= Material::find($id);
        if ($material !='') {
            $this->description=$material->description;
            $this->point_for_kilogram=$material->point_for_kilogram;
            $this->created_user_id=$material->created_user_id;
            $this->updated_user_id=$material->updated_user_id;
        }
    }

    public function update()
    {
        $this->validate([
            'description'=>'required',
            'point_for_kilogram'=>'required',
            'created_user_id'=>'required',
            'updated_user_id'=>'required'
        ],[],[
            'description'=> 'descripción',
            'point_for_kilogram'=> 'puntos por kilogramo',
            'created_user_id'=> 'creado por:',
            'updated_user_id'=> 'actualizado por:'
        ]);

        $material=Material::find($this->materialId);
        $material->description= $this->description;
        $material->point_for_kilogram= $this->point_for_kilogram;
        $material->created_user_id= $this->created_user_id;
        $material->updated_user_id= $this->updated_user_id;

        $material->update();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function delete($id)
    {
        $this->materialId=$id;
    }

    public function destroy()
    {
        $material=Material::find($this->materialId);
        $material->delete();
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
