<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateAddressInformation extends Component
{
    public ?string $direccion = "";
    public ?string $zipcode = "";
    public ?string $ciudad = "";
    public ?string $comunidad_autonoma = "";
    public ?string $pais = "";
    public ?string $num_telefono  = "";

    protected $rules = [
        'direccion' => ['required', 'string'],
        'zipcode' => ['required', 'string'],
        'ciudad' => ['required', 'string'],
        'comunidad_autonoma' => ['required', 'string'],
        'pais' => ['required', 'string'],
        'num_telefono' => ['required', 'string'],
    ];

    public function updateAddressInformation()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);
        $user->update([
            'direccion' => $this->direccion,
            'zipcode' => $this->zipcode,
            'ciudad' => $this->ciudad,
            'comunidad_autonoma' => $this->comunidad_autonoma,
            'pais' => $this->pais,
            'num_telefono' => $this->num_telefono,
        ]);
        //Creo la variable de sesion para que muestre el 'Saved.'
        session()->flash('mensaje', 'Saved.');
        /* $user->save(); */

        /* $this->emit('saved');  */
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user) {
            $this->direccion = $user->direccion;
            $this->zipcode = $user->zipcode;
            $this->ciudad = $user->ciudad;
            $this->comunidad_autonoma = $user->comunidad_autonoma;
            $this->pais = $user->pais;
            $this->num_telefono = $user->num_telefono;
        }
    }

    public function render()
    {
        return view('livewire.update-address-information');
    }
}
