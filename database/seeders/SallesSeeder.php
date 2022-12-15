<?php

namespace Database\Seeders;

use App\Models\Exposition;
use App\Models\Salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SallesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Salle::factory()->create([
            'nom' => 'Art du pixel',
            'theme' => 'Art du pixel',
            'description' => ''
        ]);

        Salle::factory()->create([
            'nom' => 'Oeuvre IA',
            'theme' => 'Oeuvre IA',
            'description' => ''
        ]);

        Salle::factory()->create([
            'nom' => 'Rendu 3D',
            'theme' => 'Rendu 3D',
            'description' => ''
        ]);

        Salle::factory()->create([
            'nom' => 'Flat design',
            'theme' => 'Flat design',
            'description' => ''
        ]);

        Salle::factory()->create([
            'nom' => 'Outdoor',
            'theme' => 'Libre',
            'description' => 'Salle réservée aux visiteurs qui souhaitent faire connaitre de nouveaux artistes...'
        ]);
    }
}
