<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                'title' => 'Spirited',
                'description' => "A musical version of Charles Dickens's story of a miserly misanthrope who is taken on a magical journey.",
                'genre' => json_encode(array("Comedy", "Family", "Musical")),
                'actor' => json_encode(array("Will Ferrell", "Ryan Reynolds", "Octavia Spencer")),
                'character_name' => json_encode(array("Ebenezer Scrooge", "Clint Brigs", "Kimberly")),
                'director' => "Sean Anders",
                'release_date' => '2022-11-11',
                'image_thumbnail' => 'movies/thumbnails/spirited.jpg',
                'background' => 'movies/backgrounds/spirited.jpg'
            ],
            [
                'title' => 'Baby Driver',
                'description' => "After being coerced into working for a crime boss, a young getaway driver finds himself taking part in a heist doomed to fail.",
                'genre' => json_encode(array("Action", "Crime", "Drama")),
                'actor' => json_encode(array("Ansel Elgort", "Lily James", "Kevin Spacey")),
                'character_name' => json_encode(array("Miles 'Baby'", "Debora", "'Doc'")),
                'director' => "Edgar Wright",
                'release_date' => '2017-03-11',
                'image_thumbnail' => 'movies/thumbnails/baby-driver.jpg',
                'background' => 'movies/backgrounds/baby-driver.jpg'
            ],
            [
                'title' => 'Green Book',
                'description' => "A working-class Italian-American bouncer becomes the driver for an African-American classical pianist on a tour of venues through the 1960s American South.",
                'genre' => json_encode(array("Biography", "Comedy", "Drama")),
                'actor' => json_encode(array("Viggo Mortensen", "Mahershala Ali", "Linda Cardellini")),
                'character_name' => json_encode(array("Tony Lip", "Don Shirley", "Dolores")),
                'director' => "Peter Farrelly",
                'release_date' => '2018-09-11',
                'image_thumbnail' => 'movies/thumbnails/green-book.jpg',
                'background' => 'movies/backgrounds/green-book.jpg'
            ],
            [
                'title' => 'The Secret Life of Walter Mitty',
                'description' => "When both he and a colleague are about to lose their job, Walter takes action by embarking on an adventure more extraordinary than anything he ever imagined.",
                'genre' => json_encode(array("Adventure", "Comedy", "Drama")),
                'actor' => json_encode(array("Ben Stiller", "Kristen Wiig", "Adam Scott")),
                'character_name' => json_encode(array("Walter Mitty", "Cheryl Melhoff", "Ted Hendricks")),
                'director' => "Ben Stiller",
                'release_date' => '2013-10-05',
                'image_thumbnail' => 'movies/thumbnails/walter-mitty.jpg',
                'background' => 'movies/backgrounds/walter-mitty.jpg'
            ],
            [
                'title' => 'Overlord',
                'description' => "A small group of American soldiers find horror behind enemy lines on the eve of D-Day.",
                'genre' => json_encode(array("Action", "Horror", "Sci-Fi")),
                'actor' => json_encode(array("Jovan Adepo", "Wyatt Russell", "Pilou Asbæk")),
                'character_name' => json_encode(array("Private First Class Edward Boyce", "Corporal Lewis Ford", "Captain Wafner")),
                'director' => "Julius Avery",
                'release_date' => '2018-09-22',
                'image_thumbnail' => 'movies/thumbnails/overlord.jpg',
                'background' => 'movies/backgrounds/overlord.jpg'
            ],
        ];
        Movie::insert($movies);
    }
}
