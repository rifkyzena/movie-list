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

    public function actorDetail($id)
    {
        $actor = Actor::find($id);
        $movies = Movie::all();
        return view('pages.detail-actor', compact('actor', 'movies'));
    }

    public function movie()
    {
        $movies = Movie::all();
        return view('pages.movie', compact('movies'));
    }

    public function movieDetail($id)
    {
        $movie = Movie::find($id);
        $more = Movie::take(6)->get();
        $actors = Actor::all();
        $actor_names = Actor::pluck('name');
        return view('pages.detail-movie', compact('movie', 'more', 'actors'));
    }
}
