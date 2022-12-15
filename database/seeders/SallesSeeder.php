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
            'description' => 'Cette salle exclusivement dédiée à l’art dérivé des cubes de pixel des années 90, vous transportera à travers un univers graphique bien à lui. Des artistes français tous exceptionnels vous y attendent alors embarquez vite pour la découverte !'
        ]);

        Salle::factory()->create([
            'nom' => 'Oeuvre IA',
            'theme' => 'Oeuvre IA',
            'description' => 'L’art de manipuler l’Intelligence Artificielle est un art nouveau en vogue en ce moment. Validez votre ticket pour visualiser les meilleurs artistes IA et leurs œuvres aussi splendides les unes que les autres.'
        ]);

        Salle::factory()->create([
            'nom' => 'Rendu 3D',
            'theme' => 'Rendu 3D',
            'description' => 'L’utilisation de la 3D dans l’art a créé de nouvelles possibilités inimaginables jusqu’alors. Ouvrez les portes d’un monde en 3 dimensions faites par des experts aussi compétents que les autres, mais faites attention à l’écart entre la marche et le quai…'
        ]);

        Salle::factory()->create([
            'nom' => 'Flat design',
            'theme' => 'Flat design',
            'description' => "Contrairement à la salle tridimensionnelle située avant dans notre exposition, le flat design prend la ligne inverse et remonte aux fondamentaux en 2D de l’Art. Attendez l'arrêt total du métro avant de descendre vers un monde de design tous aussi plat les uns que les autres !"
        ]);

        Salle::factory()->create([
            'nom' => 'Libre',
            'theme' => 'Libre',
            'description' => 'Salle réservée aux visiteurs qui souhaitent faire connaitre de nouveaux artistes...'
        ]);
    }
}
