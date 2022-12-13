<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors = [
            [
                'name' => 'Ansel Elgort',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1994-03-14',
                'place_of_birth' => 'New York City, USA',
                'image_url' => 'actors/ansel-elgort.jpg',
                'popularity' => '63.22'
            ],
            [
                'name' => 'Lily James',
                'gender' => 'Female',
                'biography' => ' ',
                'date_of_birth' => '1989-04-05',
                'place_of_birth' => 'Esher, Surrey, UK',
                'image_url' => 'actors/lily-james.jpg',
                'popularity' => '59.37'
            ],
            [
                'name' => 'Kevin Spacey',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1959-07-26',
                'place_of_birth' => 'South Orange, New Jersey, USA',
                'image_url' => 'actors/kevin-spacey.jpg',
                'popularity' => '63.22'
            ],
            [
                'name' => 'Viggo Mortensen',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1958-10-20',
                'place_of_birth' => 'Watertown, New York, USA',
                'image_url' => 'actors/viggo-mortensen.jpg',
                'popularity' => '46.05'
            ],
            [
                'name' => 'Mahershala',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1974-02-16',
                'place_of_birth' => 'Oakland, California, USA',
                'image_url' => 'actors/mahershala.jpg',
                'popularity' => '62.55'
            ],
            [
                'name' => 'Linda Cardellini',
                'gender' => 'Female',
                'biography' => ' ',
                'date_of_birth' => '1975-06-25',
                'place_of_birth' => 'Redwood City, California, USA',
                'image_url' => 'actors/linda-cardellini.jpg',
                'popularity' => '58.41'
            ],
            [
                'name' => 'Jovan Adepo',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1988-09-06',
                'place_of_birth' => 'Upper Heyford, Oxfrodshire, UK',
                'image_url' => 'actors/jovan-adepo.jpg',
                'popularity' => '32.40'
            ],
            [
                'name' => 'Wyatt Russell',
                'gender' => ' ',
                'biography' => ' ',
                'date_of_birth' => '1986-07-10',
                'place_of_birth' => 'Los Angeles, California, USA',
                'image_url' => 'actors/wyatt-russell.jpeg',
                'popularity' => '58.41'
            ],
            [
                'name' => 'Pilou Asbaek',
                'gender' => ' ',
                'biography' => ' ',
                'date_of_birth' => '1982-03-02',
                'place_of_birth' => 'Copenhagen, Denmark',
                'image_url' => 'actors/pilou-asbaek.jpg',
                'popularity' => '43.91'
            ],
            [
                'name' => 'Will Ferrell',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1967-07-16',
                'place_of_birth' => 'Irvine, California, USA',
                'image_url' => 'actors/will-ferrell.jpg',
                'popularity' => '53.03'
            ],
            [
                'name' => 'Ryan Reynolds',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1976-10-23',
                'place_of_birth' => 'Vancouver, British Colombia, USA',
                'image_url' => 'actors/ryan-reynolds.jpg',
                'popularity' => '75.42'
            ],
            [
                'name' => 'Octavia Spencer',
                'gender' => 'Female',
                'biography' => ' ',
                'date_of_birth' => '1970-04-25',
                'place_of_birth' => 'Montgomery, Alabama, USA',
                'image_url' => 'actors/octavia-spencer.jpg',
                'popularity' => '47.89'
            ],
            [
                'name' => 'Ben Stiller',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1965-11-30',
                'place_of_birth' => 'New York City, USA',
                'image_url' => 'actors/ben-stiller.jpg',
                'popularity' => '52.26'
            ],
            [
                'name' => 'Kristen Wiig',
                'gender' => 'Female',
                'biography' => ' ',
                'date_of_birth' => '1973-08-22',
                'place_of_birth' => 'Canandaigue, New York, USA',
                'image_url' => 'actors/kristen-wiig.jpg',
                'popularity' => '31.94'
            ],
            [
                'name' => 'Adam Scott',
                'gender' => 'Male',
                'biography' => ' ',
                'date_of_birth' => '1973-04-03',
                'place_of_birth' => 'Santa Cruz, California, USA',
                'image_url' => 'actors/adam-scott.jpg',
                'popularity' => '40.37'
            ],
        ];
        Actor::insert($actors);
    }
}
