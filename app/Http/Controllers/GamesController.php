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
    public function create()
    {
        return view('games/create');
    }
    public function getList()
    {
        return \App\Models\Game::all();
    }
    public function store()
    {
        $game = new \App\Models\Game();
        $game->year = \request('game-year');
        $game->title = \request('game-title');
        $game->genre = \request('game-genre');
        $game->devs = \request('game-devs');
        $game->engine = \request('game-engine');
        $game->platform = \request('game-platform');
        $game->save();
        return redirect('/games');
    }
    public function edit($id)
    {
        $game = \App\Models\Game::find($id);
        return view('games/edit',
        [
            'game' => $game,
        ]);
    }
    public function update($id)
    {
        $game = \App\Models\Game::find($id);
        $game->year = \request('game-year');
        $game->title = \request('game-title');
        $game->genre = \request('game-genre');
        $game->devs = \request('game-devs');
        $game->engine = \request('game-engine');
        $game->platform = \request('game-platform');
        $game->save();
        return redirect('/games');
    }
}
