<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
class GamesController extends Controller
{
    public function index()
    {
        $games = \App\Models\Game::all()->sortBy("name");
        return view('games/index',
        [
            'games' => $games,
            'pageTitle' => 'List of games',    
        ]);
    }
    //
}
