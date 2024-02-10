<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deporte;
use Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Este metodo factory() nos sirve para insertar varios datos a las ves utilizando el factory UserFactory que ya estan los atributos 
        UserFactory::factory(50)->create();
    }
}
