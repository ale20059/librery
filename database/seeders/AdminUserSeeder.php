<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (!User::where('email', 'admin@biblioteca.com')->exists()) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@biblioteca.com',
                'password' => Hash::make('admin123'), // Cambia esto por una contraseña segura
            ]);
        }
    }
}
