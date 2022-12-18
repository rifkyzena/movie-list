<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function watchlistIndex()
    {
        $watchlists = Watchlist::where('user_id', Auth::user()->id)->paginate(5);
        return view('pages.watchlist', compact('watchlists'));
    }

    public function watchlistAdd($id){
        $data = Watchlist::where('movie_id', $id)->where('user_id', Auth::user()->id)->first();
        if($data){
            return redirect()->back()->with(['error' => 'Movie Data Already In The Watchlist']);
        }
        $query = Watchlist::create([
            'movie_id' => $id,
            'user_id' => Auth::user()->id
        ]);
        if ($query) {
            return redirect()->route('member.watchlist')->with(['success' => 'Movie Added To Watchlist']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Some problem occurred, please try again']);
        }
    }
}
