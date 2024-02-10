<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deporte;
use Database\Factories\DeporteFactory;

class DeporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // $deporte  = new Deporte();
        // $deporte->name = "futbol";
        // $deporte->descripcion = "deporte ";
        // $deporte->personas = random_int(0,100);
        // $deporte->save();
        //Este metodo factory() nos sirve para insertar varios datos a las ves utilizando el factory UserFactory que ya estan los atributos 
         DeporteFactory::factory(50)->create();
    }
}
