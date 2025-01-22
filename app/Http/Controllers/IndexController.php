<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Manufacturer;
use App\Models\Game;

class IndexController extends Controller
{
    public function index() {
        //Get data from DB in here and pass it to the view

        return view('index.index', [
            'title' => 'Game',
            'text' => '<p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
            </p>',
            'imgURL' => 'assets/images/about/about-part.jpg',
        ]);
    }

    public function getGenres()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function searchGames(Request $request)
    {
        $request->validate([
            'name_search' => 'nullable|string|max:255',
            'genre_id' => 'nullable|exists:genres,id',
            'rating' => 'required|in:asc,desc',
            'page' => 'integer|min:1'
        ]);

        $query = Game::with('genres');

        if ($request->filled('genre_id')) {
            $query->join('game_genre', 'games.id', '=', 'game_genre.game_id')->join('genres', 'game_genre.genre_id', '=', 'genres.id')->where('genres.id', $request->input('genre_id'))->select('games.id', 'games.name', 'games.description', 'games.rating', 'games.release_date', 'games.cover');


        }

        if ($request->filled('name_search')) {
            $query->where('name', 'like', '%' . $request->input('name_search') . '%');
        }

        $query->orderBy('rating', $request->input('rating'));

        $limit = $request->input('limit', 5);
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $limit;

        $games = $query->offset($offset)->limit($limit)->get();

        return response()->json($games);
    }
}
