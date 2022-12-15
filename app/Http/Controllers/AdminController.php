<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function movieCreate()
    {
        $actors = Actor::select('name')->get();
        return view('pages.admin.movie.create', compact('actors'));
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

    public function actorCreate()
    {
        return view('pages.admin.actor.create');
    }
}
