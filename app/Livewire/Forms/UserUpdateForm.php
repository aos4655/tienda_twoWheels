<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;

class UserUpdateForm extends Form
{
    public ?User $user;
    public string $name = "";
    public string $email = "";
    public string $address = "";
    public string $postal_code = "";
    public string $city = "";
    public string $country = "";
    public string $state = "";
    public string $phone_number = "";
    public string $is_admin = "";
    /* 'name',
    'email',
    'address', 
    'postal_code', 
    'city', 
    'country', 
    'state', 
    'phone_number',
    'is_admin',
 */
    public function setUser(User $user)
    {
        $this->user = $user;/* No se yo hasta que punto este campo es buneo... */
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = ($user->address != null) ? $user->address : "";
        $this->postal_code = ($user->postal_code) ? $user->postal_code : "";
        $this->city = ($user->city) ? $user->city : "";
        $this->country = ($user->country) ? $user->country : "";
        $this->state = ($user->state) ? $user->state : "";
        $this->phone_number = ($user->phone_number) ? $user->phone_number : "";
        $this->is_admin = $user->is_admin;
/*         dd($this->user);
 */    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'unique:users,name,' . $this->user->id],
            'email' => ['required', 'email'],
            'address' => ['nullable'],
            'postal_code' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'state' => ['nullable'],
            'phone_number' => ['nullable'],
            'is_admin' => ['nullable'],
        ];
    }
    public function updateUser()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'country' => $this->country,
            'state' => $this->state,
            'phone_number' => $this->phone_number,
            'is_admin' => ($this->is_admin) ? "SI" : "NO",
        ]);
    }
    public function cancelarUser()
    {
        $this->reset(
            'user',
            'name',
            'email',
            'address',
            'postal_code',
            'city',
            'country',
            'state',
            'phone_number',
            'is_admin'
        );
    }
}
