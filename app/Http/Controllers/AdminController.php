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
            'image_thumbnail' => 'image|mime:jpeg,jpg,png,gif',
            'background' => 'image|mime:jpeg,jpg,png,gif'
        ]);

        $model = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'actor' => $request->actor,
            'character_name' => $request->character_name,
            'director' => $request->director,
            'release_date' => $request->release_date,
            'image_thumbnail' => $request->image_thumbnail,
            'background' => $request->background
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
