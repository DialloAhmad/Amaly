<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            "email" => "ahmad@gmail.com", 
            "password" => Hash::make("mamanpapa1"), 
            "nom" => "Oularé",
            "prenom" => "Ibrahima Douty",
            "genre" => "Masculin",
            "telephone" => "00224625651831",
            "description" => "Co-fondateur Amaly",
            "poste" => "Co-fondateur",
            "compagnie" => "Amaly",
            "ville" => "Conakry",
            "quartier" => "Kobayah",
            "profil" => "Demandeur",
        ]);
    }
}
