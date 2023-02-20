<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Product;
use Livewire\Component;

class ProductsComponent extends Component
{
    public $products, $productId, $description, $details, $presentation, $weight_gr, $created_user_id, $updated_user_id;
    public $updateMode = false;

    public function render()
    {
        $this->products=Product::all();
        return view('livewire.admin.settings.products-component');
    }

    public function store()
    {
        $this->validate([
            'description'=>'required',
            'details'=>'required',
            'presentation'=>'required',
            'weight_gr'=>'required',
            // 'created_user_id'=>'required',
            // 'updated_user_id'=>'required'
        ],[],[
            'description'=> 'descripción',
            'details'=>'detalles',
            'presentation'=>'presentación',
            'weight_gr'=>'peso en gramos',
            // 'created_user_id'=> 'creado por:',
            // 'updated_user_id'=> 'actualizado por:'
        ]);
        $product=new Product();
        $product->description= $this->description;
        $product->details= $this->details;
        $product->presentation= $this->presentation;
        $product->weight_gr= $this->weight_gr;
        $product->created_user_id= $this->created_user_id;
        $product->updated_user_id= $this->updated_user_id;

        $product->save();
        $this->resetInputFields();
        $this->emit('close-modal');
    }
    public function resetInputFields()
    {
        $this->description='';
        $this->details='';
        $this->presentation='';
        $this->weight_gr='';
        $this->created_user_id='';
        $this->updated_user_id='';
    }

    public function edit($id)
    {
        $this->productId=$id;
        $product=Product::find($id);
        if ($product !='') {
            $this->description=$product->description;
            $this->details=$product->details;
            $this->presentation=$product->presentation;
            $this->weight_gr=$product->weight_gr;
            $this->created_user_id=$product->created_user_id;
            $this->updated_user_id=$product->updated_user_id;
        }
    }

    public function update()
    {
        $this->validate([
            'description'=>'required',
            'details'=>'required',
            'presentation'=>'required',
            'weight_gr'=>'required',
            // 'created_user_id'=>'required',
            // 'updated_user_id'=>'required'
        ],[],[
            'description'=> 'descripción',
            'details'=>'detalles',
            'presentation'=>'presentación',
            'weight_gr'=>'peso en gramos',
            // 'created_user_id'=> 'creado por:',
            // 'updated_user_id'=> 'actualizado por:'
        ]);

        $product=Product::find($this->productId);
        $product->description= $this->description;
        $product->details= $this->details;
        $product->presentation= $this->presentation;
        $product->weight_gr= $this->weight_gr;
        $product->created_user_id= $this->created_user_id;
        $product->updated_user_id= $this->updated_user_id;

        $product->update();
        $this->resetInputFields();
        $this->emit('close-modal');
    }

    public function delete($id)
    {
        $this->productId=$id;
    }

    public function destroy()
    {
        $product=Product::find($this->productId);
        $product->delete();
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
