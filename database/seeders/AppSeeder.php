<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run(): void
    {
        // IVOCANDO A TODOS LOS SEEDERS
        $this->call([
            PersonsSeeder::class, 
            UsersSeeder::class, 
            QuestionsSeeder::class, 
        ]);
    }
}
