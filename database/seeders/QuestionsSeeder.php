<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\SecretQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::insert([
            ['question' => '¿Cuál es el nombre de tu primera mascota?'],
            ['question' => '¿Cuál fue el nombre de tu escuela primaria?'],
            ['question' => '¿Cuél es tú deporte favorito"?'],
        ]);

        SecretQuestion::insert([
            // USER N1
            [
                'fk_question' => 1,
                'fk_user' => 1,
                'answer' => Hash::make('Apolo'),
            ],
            [
                'fk_question' => 2,
                'fk_user' => 1,
                'answer' => Hash::make('Republica del Ecuador'),
            ],
            [
                'fk_question' => 3,
                'fk_user' => 1,
                'answer' => Hash::make('Basquetbol'),
            ],
            // USER N2
            [
                'fk_question' => 1,
                'fk_user' => 2,
                'answer' => Hash::make('Goku'),
            ],
            [
                'fk_question' => 2,
                'fk_user' => 2,
                'answer' => Hash::make('Goku'),
            ],
            [
                'fk_question' => 3,
                'fk_user' => 2,
                'answer' => Hash::make('Goku'),
            ],
        ]);
    }
}
