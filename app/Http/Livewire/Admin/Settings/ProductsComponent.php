<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Product;
use App\ProductsImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ProductsComponent extends Component
{
    use WithFileUploads;
    public $images = [];
    
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
            'images.*' => 'image|max:1024', // 1MB Max
        ],[],[
            'description'=> 'descripción',
            'details'=>'detalles',
            'presentation'=>'presentación',
            'weight_gr'=>'peso en gramos',
        ]);
        $product=new Product();
        $product->description= $this->description;
        $product->details= $this->details;
        $product->presentation= $this->presentation;
        $product->weight_gr= $this->weight_gr;
        $product->created_user_id= Auth::user()->id;
        $product->updated_user_id= Auth::user()->id;

        $product->save();
        

        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images','public');
        }

        foreach ($this->images as $img) {
            $image=new ProductsImage();
            $image->product_id=$product->id;
            $image->image=$img;
            $image->save();
        }

        $this->resetInputFields();
        $this->emit('close-modal');
    }
    public function resetInputFields()
    {
        $this->description='';
        $this->details='';
        $this->presentation='';
        $this->weight_gr='';

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
        ],[],[
            'description'=> 'descripción',
            'details'=>'detalles',
            'presentation'=>'presentación',
            'weight_gr'=>'peso en gramos',
        ]);

        $product=Product::find($this->productId);
        $product->description= $this->description;
        $product->details= $this->details;
        $product->presentation= $this->presentation;
        $product->weight_gr= $this->weight_gr;
        $product->updated_user_id= Auth::user()->id;

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
