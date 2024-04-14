<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Aqui van a ir todos mis usuarios administradores
        User::create([
            'name' => 'Antonio',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), //La hasheo para que luego el login la coja bien 
            'is_admin' => "SI"
        ]);
    }
}
