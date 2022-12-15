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
            'nom' => "Women in town",
            'media_url' => "images/oeuvres/Women_in_town.png",
            'thumbnail_url' => 'images/thumbnails/Women_in_town.png',
            'description' => 'C’est une oeuvre qui a été créé en 2015, elle représente le visage d’une femme avec comme fond une ville',
            'date_creation' => '2015-01-01',
            'style' => 'Pixel',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Olivier Huard',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "End of a star",
            'media_url' => "images/oeuvres/End_of_a_star.png",
            'thumbnail_url' => 'images/thumbnails/End_of_a_star.png',
            'description' => 'C’est une oeuvre qui a été créé en 2017, elle fait directement une référence a l’episode 4 de Star Wars lors de l’explosion de l’étoile noire',
            'date_creation' => '2017-01-01',
            'style' => 'Pixel',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Olivier Huard',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Floating city",
            'media_url' => "images/oeuvres/Floating_city.png",
            'thumbnail_url' => 'images/thumbnails/Floating_city.png',
            'description' => 'Cet art du pixel créé en 2017, représente directement notre capital bien aimé Paris.',
            'date_creation' => '2017-01-01',
            'style' => 'Pixel',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Olivier Huard',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Voxel Art Paris",
            'media_url' => "images/oeuvres/Paris.jpg",
            'thumbnail_url' => 'images/thumbnails/Paris.jpg',
            'description' => 'Cette oeuvre est art voxel, de l’art du Pixel en 3D date de 2015 et représente la ville de Paris avec un métro et sa tour Eiffel',
            'date_creation' => '2015-01-01',
            'style' => 'Pixel',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Antoine Lendrevie',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Ile Volante",
            'media_url' => "images/oeuvres/Ile_volante.jpg",
            'thumbnail_url' => 'images/thumbnails/Ile_volante.jpg',
            'description' => 'C’est un art voxel, de 2015, représentant des iles volantes avec un tour encerclé d’eau ainsi qu’une maison',
            'date_creation' => '2015-01-01',
            'style' => 'Pixel',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Antoine Lendrevie',
            'salle_id' => '1',
        ])->create();

        Oeuvre::factory([
            'nom' => "Colosse de Rhodes",
            'media_url' => "images/oeuvres/Colosse_de_Rhodes.jpg",
            'thumbnail_url' => 'images/thumbnails/Colosse_de_Rhodes.jpg',
            'description' => 'créée en 2022, elle représente le colosse de Rhodes dans un port.',
            'date_creation' => '2022-01-01',
            'style' => 'OeuvreIA',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Obvious art',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Jardins de Babylones",
            'media_url' => "images/oeuvres/Jardins_de_Babylone.jpg",
            'thumbnail_url' => 'images/thumbnails/Jardins_de_Babylone.jpg',
            'description' => 'créée en 2022, elle représente les jardins de Babylone.',
            'date_creation' => '2022-01-01',
            'style' => 'OeuvreIA',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Obvious art',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Pyramides de gizeh",
            'media_url' => "images/oeuvres/Pyramides_de_Gizeh.jpg",
            'thumbnail_url' => 'images/thumbnails/Pyramides_de_Gizeh.jpg',
            'description' => 'créée en 2022, elle représente la pyramide de Giza',
            'date_creation' => '2022-01-01',
            'style' => 'OeuvreIA',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Obvious art',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Phare d'Alexandrie",
            'media_url' => "images/oeuvres/Phare_dAlexandrie.jpg",
            'thumbnail_url' => 'images/thumbnails/Phare_dAlexandrie.jpg',
            'description' => 'créée en 2022, elle représente le Phare d\'Alexandrie en feu submergé par des vagues.',
            'date_creation' => '2022-01-01',
            'style' => 'OeuvreIA',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Obvious art',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "Statue de Zeus",
            'media_url' => "images/oeuvres/Statue_de_Zeus.jpg",
            'thumbnail_url' => 'images/thumbnails/Statue_de_Zeus.jpg',
            'description' => 'créée en 2022, elle représente Dieu de l’olympe également appelé Zeus.',
            'date_creation' => '2022-01-01',
            'style' => 'OeuvreIA',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Obvious art',
            'salle_id' => '2',
        ])->create();

        Oeuvre::factory([
            'nom' => "ONE PIECE “Buster Call”",
            'media_url' => "images/oeuvres/ONE_PIECE_Buster_Call.png",
            'thumbnail_url' => 'images/thumbnails/ONE_PIECE_Buster_Call.png',
            'description' => 'Cette création 3D, de 2019, représentant une scène d’un episode de One Piece',
            'date_creation' => '2019-01-01',
            'style' => 'Rendu3D',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Quentin Deronzier',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Pokeball",
            'media_url' => "images/oeuvres/Pokeball.png",
            'thumbnail_url' => 'images/thumbnails/Pokeball.png',
            'description' => 'Datant de 2020, cette création d’une pokeball qui est tagué',
            'date_creation' => '2020-01-01',
            'style' => 'Rendu3D',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Marius Longo',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Xbox",
            'media_url' => "images/oeuvres/Xbox.jpg",
            'thumbnail_url' => 'images/thumbnails/Xbox.jpg',
            'description' => 'C’est une création 3D datant de 2021 pour le lancement de la Xbox Series X ',
            'date_creation' => '2021-01-01',
            'style' => 'Rendu3D',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Quentin Deronzier',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Dreamstate Poland 2019",
            'media_url' => "images/oeuvres/Poland.jpg",
            'thumbnail_url' => 'images/thumbnails/Poland.jpg',
            'description' => 'Cette 3D de 2019, représente une ville futuriste de Pologne',
            'date_creation' => '2019-01-01',
            'style' => 'Rendu3D',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Yvan Feusi',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "Power.io",
            'media_url' => "images/oeuvres/PowerIo.png",
            'thumbnail_url' => 'images/thumbnails/PowerIo.png',
            'description' => 'C’est un création 3D de 2018 qui a pour but de représenter un humain',
            'date_creation' => '2018-01-01',
            'style' => 'Rendu3D',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Samylacrapule',
            'salle_id' => '3',
        ])->create();

        Oeuvre::factory([
            'nom' => "START YOUR ENGINES",
            'media_url' => "images/oeuvres/START_YOUR_ENGINES.png",
            'thumbnail_url' => 'images/thumbnails/START_YOUR_ENGINES.png',
            'description' => 'créée en 2018, elle représente une femme au volant de sa voiture.',
            'date_creation' => '2018-01-01',
            'style' => 'FlatDesign',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Malika Favre',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "LA DOCUMENTA",
            'media_url' => "images/oeuvres/Documenta.png",
            'thumbnail_url' => 'images/thumbnails/Documenta.png',
            'description' => 'créée en 2017, elle représente de nombreuses personnes en bleu et rose.',
            'date_creation' => '2017-01-01',
            'style' => 'FlatDesign',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Malika Favre',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "SYMPHONIE AU BALCON",
            'media_url' => "images/oeuvres/SYMPHONIE_AU_BALCON.png",
            'thumbnail_url' => 'images/thumbnails/SYMPHONIE_AU_BALCON.png',
            'description' => 'créée en 2017, elle représente une femme qui fait du violon devant sa fenêtre.',
            'date_creation' => '2017-01-01',
            'style' => 'FlatDesign',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Malika Favre',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "THE BIG REVEAL",
            'media_url' => "images/oeuvres/THE_BIG_REVEAL.jpg",
            'thumbnail_url' => 'images/thumbnails/THE_BIG_REVEAL.jpg',
            'description' => 'créée en 2018, elle représente en homme écrivant seul à son bureau.',
            'date_creation' => '2018-01-01',
            'style' => 'FlatDesign',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Malika Favre',
            'salle_id' => '4',
        ])->create();

        Oeuvre::factory([
            'nom' => "RENDEZ-VOUS",
            'media_url' => "images/oeuvres/RENDEZ_VOUS.png",
            'thumbnail_url' => 'images/thumbnails/RENDEZ_VOUS.png',
            'description' => 'créée en 2022, elle représente une femme au bord de la piscine.',
            'date_creation' => '2022-01-01',
            'style' => 'FlatDesign',
            'coord_x' => '0',
            'coord_y' => '0',
            'valide' =>'1',
            'auteur' => 'Malika Favre',
            'salle_id' => '4',
        ])->create();
    }
}
