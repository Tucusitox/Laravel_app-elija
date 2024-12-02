<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Person;

use Illuminate\Database\Seeder;

class PersonsSeeder extends Seeder
{
    public function run(): void
    {
        // INSERTAR DATOS EN LA TABLA "genders"
        Gender::insert([
            ['gender_name' => 'Masculino'],
            ['gender_name' => 'Femenino'],
        ]);
        // INSERTAR DATOS EN LA TABLA "nationalities"
        Nationality::insert([
            [
                'nationality_name' => 'Venezuela',
                'nationality_regex' => '/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}$/',
            ],
            [
                'nationality_name' => 'Estados Unidos',
                'nationality_regex' => '/^[0-9]{3}\-[0-9]{2}\-[0-9]{4}$/',
            ],
            [
                'nationality_name' => 'Inglaterra',
                'nationality_regex' => '/^[A-Z]{2}[0-9]{6}[A-Z]{1}$/',
            ],
        ]);

        // INSERTAR DATOS EN LA TABLA PERSONS
        Person::insert([
            [
                'fk_gender' => 1,
                'fk_nationality' => 1,
                'person_img' => 'img/imgUsers/Yuta Starboy.jpg',
                'person_identification' => '27.995.612',
                'person_name' => 'José Daniel',
                'person_lastname' => 'Morian Pérez',
                'person_birthDate' => '2001-07-16',
                'person_description' => 'Soy un tio chill de cojones. Me gusta disfrutar de la vida a un ritmo relajado, buscando siempre momentos de calma en medio del caos. Tengo un enfoque positivo y una actitud abierta hacia las experiencias nuevas. Ya sea compartiendo risas con amigos, explorando la naturaleza o simplemente relajándome con buena música, siempre encuentro una forma de mantener la buena vibra. La vida es demasiado corta para estresarse, así que prefiero tomarme las cosas con tranquilidad y disfrutar del viaje.',
                'person_address' => 'Urb. Ezequiel Zamora, Ciudad Tiuna, Torre-37, Piso-4. Apt-C',
            ],
            [
                'fk_gender' => 2,
                'fk_nationality' => 2,
                'person_img' => 'img/imgUsers/mujer.jpg',
                'person_name' => 'Alejandra Daniela',
                'person_lastname' => 'Castillo Mendoza',
                'person_identification' => '307-66-5321',
                'person_birthDate' => '1995-05-05',
                'person_description' => 'Soy una tia chill de cojones. Me gusta disfrutar de la vida a un ritmo relajado, buscando siempre momentos de calma en medio del caos. Tengo un enfoque positivo y una actitud abierta hacia las experiencias nuevas. Ya sea compartiendo risas con amigos, explorando la naturaleza o simplemente relajándome con buena música, siempre encuentro una forma de mantener la buena vibra. La vida es demasiado corta para estresarse, así que prefiero tomarme las cosas con tranquilidad y disfrutar del viaje.',
                'person_address' => 'Avenida Siempre Viva 456, Calle 40, Casa N5',
            ],
        ]);
    }
}
