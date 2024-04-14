<?php

namespace App\Livewire\Forms;

use App\Models\Categoria;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryUpdateForm extends Form
{

    public ?Categoria $category;
    public string $name = "";

    public function setCategory(Categoria $category)
    {
        $this->category = $category;
        $this->name = $category->nombre;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'unique:categorias,nombre,' . $this->category->id],
        ];
    }
    public function updateCategory()
    {
        $this->validate();
        $this->category->update([
            'nombre' => $this->name,
        ]);
    }
    public function cancelarCategory()
    {
        $this->reset(
            'category',
            'name',
        );
    }
}
