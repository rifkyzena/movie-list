<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function movieCreate()
    {
        $actors = Actor::select('name')->get();
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
        return view('pages.admin.movie.create', compact('actors', 'genres'));
    }

    public function movieStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:8',
            'genre' => 'required|array',
            'actor' => 'required|array',
            'character_name' => 'required|array',
            'director' => 'required|min:8',
            'release_date' => 'required',
            'image_thumbnail' => 'image|mimes:jpeg,jpg,png,gif',
            'background' => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        $image_thumbnail = $request->file('image_thumbnail')->store('movies/thumbnails');
        $background = $request->file('background')->store('movies/backgrounds');

        $model = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => json_encode($request->genre),
            'actor' => json_encode($request->actor),
            'character_name' => json_encode($request->character_name),
            'director' => $request->director,
            'release_date' => $request->release_date,
            'image_thumbnail' => $image_thumbnail,
            'background' => $background
        ]);

        if ($model) {
            return redirect()->route('movie')->with(['success' => 'Data Saved Successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }

    public function movieEdit($id)
    {
        $movie = Movie::find($id);
        $actors = Actor::select('name')->get();
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
        $count = count(json_decode($movie->actor));
        return view('pages.admin.movie.edit', compact('movie', 'actors', 'genres', 'count'));
    }

    public function movieUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:50',
            'description' => 'required|min:8',
            'genre' => 'required|array',
            'actor' => 'required|array',
            'character_name' => 'required|array',
            'director' => 'required|min:8',
            'release_date' => 'required',
            'image_thumbnail' => 'image|mimes:jpeg,jpg,png,gif',
            'background' => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->file('image_thumbnail')) {
            if ($request->image_thumbnail_old) {
                Storage::delete($request->image_thumbnail_old);
            }
            $image_thumbnail = $request->file('image_thumbnail')->store('movies/thumbnails');
        } else {
            $image_thumbnail = $request->image_thumbnail_old;
        }
        if ($request->file('background')) {
            if ($request->background_old) {
                Storage::delete($request->background_old);
            }
            $background = $request->file('background')->store('movies/backgrounds');
        } else {
            $background = $request->background_old;
        }
        $model = Movie::find($request->id);
        $model->update([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => json_encode($request->genre),
            'actor' => json_encode($request->actor),
            'character_name' => json_encode($request->character_name),
            'director' => $request->director,
            'release_date' => $request->release_date,
            'image_thumbnail' => $image_thumbnail,
            'background' => $background
        ]);
        if ($model) {
            return redirect()->route('movie.detail', $request->id)->with(['success' => 'Data Updated Successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }

    public function movieDestroy($id)
    {
        Movie::find($id)->delete();
        return response()->json(['success' => 'Data Deleted Successfully']);
    }

    public function actorCreate()
    {
        return view('pages.admin.actor.create');
    }

    public function actorStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'gender' => 'required',
            'biography' => 'required|min:10',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'image_url' => 'image|mimes:jpeg,jpg,png,gif',
            'popularity' => 'numeric'
        ]);

        $image_url = $request->file('image_url')->store('actors');
        $model = Actor::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'image_url' => $image_url,
            'popularity' => $request->popularity,
        ]);
        if ($model) {
            return redirect()->route('actor')->with(['success' => 'Data Saved Successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }

    public function actorEdit($id)
    {
        $actor = Actor::find($id);
        return view('pages.admin.actor.edit', compact('actor'));
    }

    public function actorUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'gender' => 'required',
            'biography' => 'required|min:10',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'image_url' => 'image|mimes:jpeg,jpg,png,gif',
            'popularity' => 'numeric'
        ]);

        if ($request->file('image_url')) {
            if ($request->image_url_old) {
                Storage::delete($request->image_url_old);
            }
            $image_url = $request->file('image_url')->store('movies/image_urls');
        } else {
            $image_url = $request->image_url_old;
        }

        $model = Actor::find($request->id);
        $model->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'biography' => $request->biography,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'image_url' => $image_url,
            'popularity' => $request->popularity,
        ]);

        if ($model) {
            return redirect()->route('actor.detail', $request->id)->with(['success' => 'Data Updated Successfully']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }

    public function actorDestroy($id)
    {
        Actor::find($id)->delete();
        return response()->json(['success' => 'Data Deleted Successfully']);
    }
}
