<?php

namespace Database\Seeders;

use App\Models\Auteur;
use App\Models\Oeuvre;
use App\Models\Salle;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OeuvresSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create('fr_FR');
        $salle_ids = Salle::all()->pluck('id');

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "Robert Duchmol",
            'media_url' => "robert.duchmol@domain.fr",
            'thumbnail_url' => 'description',
            'description' => '',
            'date_creation' => '',
            'style' => '',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'true',
            'auteur' => '',
            'salle_id' => '4',
        ])->create();
    }
}
