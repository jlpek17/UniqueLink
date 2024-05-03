<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        // créate the admin
        User::create([
            'pseudo' => 'administrateur',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@niceplace.fr',
            'email_verified_at' => now(),
            'departement_id' =>'80',
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        // create test user
        User::create([
        'pseudo' => 'utilisateur',
            'password' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'departement_id' =>'86',
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        //create 8 ramdom user
        User::factory(8)->create();
    }
}
