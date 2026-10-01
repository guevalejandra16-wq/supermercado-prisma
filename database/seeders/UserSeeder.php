<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $administrador = Role::where('nombre', 'Administrador')->first();

        $usuario = User::create([
            'name' => 'Administrador',
            'email' => 'admin@prisma.com',
            'password' => Hash::make('Prisma123'),
            'estado' => true,
        ]);

        $usuario->roles()->attach($administrador->id);
    }
}