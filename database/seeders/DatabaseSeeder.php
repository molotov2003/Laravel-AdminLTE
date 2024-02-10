<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deporte;
use Database\Factories\DeporteFactory;
use Database\Factories\UserFactory;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Al ejecutar un factory primero se tiene que llamar el seeder principal y se utliza la funcion run 
        //y aqui se llama el seeder que se quiera ejecuta 

        //En este seeder llamamos el factory de deportes para hacer la insercion, el metodo count()elegimos la cantidad de datos 
        // que queremos insertar
        DeporteFactory::factoryForModel(Deporte::class)->count(50)->create();
          //En este seeder llamamos el factory de Usuarios para hacer la insercion, el metodo count()elegimos la cantidad de datos 
        // que queremos insertar
        UserFactory::factoryForModel(User::class)->count(50)->create();
    }
}
