<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Necesario para subir fotos
use App\Models\Product;

class CreateProduct extends Component
{
    use WithFileUploads;

    // Propiedades del formulario
    public $name, $description, $price, $cost, $stock, $min_stock, $image;

    // Reglas de validación (parecido a las anotaciones en Java)
    protected $rules = [
        'name' => 'required|min:3',
        'price' => 'required|numeric',
        'cost' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|max:2048', // Max 2MB
    ];

    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'cost' => $this->cost,
            'stock' => $this->stock,
            'min_stock' => $this->min_stock ?? 5,
            'image_path' => $imagePath,
        ]);

        return redirect()->to('/dashboard')->with('status', 'Producto registrado con éxito.');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}

?>