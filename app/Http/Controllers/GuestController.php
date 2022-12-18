<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function home()
    {
        $movies = Movie::all();
        $movie_populars = Movie::take(8)->get();
        $slider = Movie::inRandomOrder()->limit(3)->get();
        $user = Auth::user();
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Animated'],
            ['name' => 'Biography'],
            ['name' => 'Comedy'],
            ['name' => 'Crime'],
            ['name' => 'Disaster'],
            ['name' => 'Drama'],
            ['name' => 'Family'],
            ['name' => 'Fantasy'],
            ['name' => 'History'],
            ['name' => 'Horror'],
            ['name' => 'Mystery'],
            ['name' => 'Musical'],
            ['name' => 'Romance'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Sport'],
            ['name' => 'Thriller'],
        ];
        return view('pages.home', compact('movies', 'slider', 'movie_populars', 'user', 'genres'));
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

    public function movieSearch(Request $request){
        $model = Movie::with('watchlist')->where('title','LIKE','%'.$request->param.'%')->get();
        return response()->json($model);
    }

    public function movieSortLatest(){
        $model = Movie::with('watchlist')->orderBy('id', 'DESC')->get();
        return response()->json($model);
    }

    public function movieSortAsc(){
        $model = Movie::with('watchlist')->orderBy('title', 'ASC')->get();
        return response()->json($model);
    }

    public function movieSortDesc(){
        $model = Movie::with('watchlist')->orderBy('title', 'DESC')->get();
        return response()->json($model);
    }

    public function movieSortCategory(Request $request){
        $movies = Movie::all();
        $model = collect([]);
        foreach($movies as $m){
            foreach(json_decode($m->genre) as $g){
                if($g == $request->param){
                    $model->push([
                        'id' => $m->id,
                        'title' => $m->title,
                        'release_date' => $m->release_date,
                        'image_thumbnail' => $m->image_thumbnail,
                        'watchlist' => $m->watchlist
                    ]);
                }
            }
        }
        return response()->json($model);
    }
}
