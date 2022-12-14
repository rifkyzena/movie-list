<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function movieCreate()
    {
        return view('pages.admin.movie.create');
    }

    public function actorCreate()
    {
        return view('pages.admin.actor.create');
    }
}
