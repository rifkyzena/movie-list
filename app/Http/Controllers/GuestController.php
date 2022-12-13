<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $movies = Movie::all();
        $slider = Movie::take(3)->get();
        return view('pages.home', compact('movies', 'slider'));
    }

    public function actor()
    {
        $actors = Actor::all();
        return view('pages.actor', compact('actors'));
    }

    public function movie()
    {
        $movies = Movie::all();
        return view('pages.movie', compact('movies'));
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        $movies = Movie::take(6)->get();
        return view('pages.detail-movie', compact('movie', 'movies'));
    }
}
