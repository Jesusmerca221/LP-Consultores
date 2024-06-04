<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'nombres' => 'Administrador',
                'apellidos' => 'Administrador',
                'email' => 'Administrador@gmail.com',
                'password' => bcrypt('123456789'),
                'telefono' => '3281234'
            ]
        )->assignRole('Administrador');
        User::create(
            [
                'nombres' => 'Estudiante',
                'apellidos' => 'Estudiante',
                'email' => 'Estudiante@gmail.com',
                'password' => bcrypt('123456789'),
                'telefono' => '3281234'
            ]
        )->assignRole('Estudiante');
    }
}
