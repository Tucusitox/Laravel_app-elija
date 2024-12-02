<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use App\Models\SocialnetworksXUser;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // INSERTAR DATOS EN LA TABLA "users"
        User::insert([
            [
                'fk_person' => 1,
                'email' => 'jdmorianperez@gmail.com',
                'password' => Hash::make('Morian.-12345'),
                'email_verified' => 'true',
            ],
            [
                'fk_person' => 2,
                'email' => 'kuramasenin555@gmail.com',
                'password' => Hash::make('Morian.-12345'),
                'email_verified' => 'true',
            ],
        ]);

        // INSERTAR DATOS EN LA TABLA "websites"
        Website::insert([
            [
                'fk_user' => 1,
                'website_tittle' => 'Bootstrap · The most popular HTML, CSS, and JS library in the world.',
                'website_url' => 'https://getbootstrap.com',
                'website_img' => 'img/urlCaptures/2024-12-02674d52007bccb.png',
            ],
            [
                'fk_user' => 2,
                'website_tittle' => 'Astro',
                'website_url' => 'https://astro.build',
                'website_img' => 'img/urlCaptures/2024-12-02674d613c3a46f.png',
            ],
        ]);

        // INSERTAR DATOS EN LA TABLA "social_networks"
        SocialNetwork::insert([
            ['socialNetwork_name' => 'Facebook'],
            ['socialNetwork_name' => 'Instagram'],
            ['socialNetwork_name' => 'Twitter'],
            ['socialNetwork_name' => 'TikTok'],
        ]);

        // INSERTAR DATOS EN LA TABLA "socialNetworks_x_users"
        SocialnetworksXUser::insert([
            // USER 1
            [
                'fk_socialNetwork' => 1,
                'fk_user' => 1,
                'socialNetwUser_name' => 'Tucusitox'
            ],
            [
                'fk_socialNetwork' => 2,
                'fk_user' => 1,
                'socialNetwUser_name' => 'Tucux16'
            ],
            [
                'fk_socialNetwork' => 3,
                'fk_user' => 1,
                'socialNetwUser_name' => 'Nairom16'
            ],
            // USER 2
            [
                'fk_socialNetwork' => 1,
                'fk_user' => 2,
                'socialNetwUser_name' => 'AleDaniela'
            ],
            [
                'fk_socialNetwork' => 2,
                'fk_user' => 2,
                'socialNetwUser_name' => 'DanielaAle13'
            ],
            [
                'fk_socialNetwork' => 3,
                'fk_user' => 2,
                'socialNetwUser_name' => 'aleCastillo'
            ],
        ]);
    }
}
