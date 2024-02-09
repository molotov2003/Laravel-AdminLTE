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
        // DeporteFactory::factoryForModel(Deporte::class)->count(50)->create();
        UserFactory::factoryForModel(User::class)->count(50)->create();
    }
}
