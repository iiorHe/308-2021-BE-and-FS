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
        \App\Models\Game::create([
            'year' => \request('game-year'),
            'title' => \request('game-title'),
            'genre' => \request('game-genre'),
            'devs' => \request('game-devs'),
            'engine' => \request('game-engine'),
            'platform' => \request('game-platform'),
        ]);
        return redirect('/games');
    }
    public function edit(\App\Models\Game $game)
    {
        return view('games/edit',
        [
            'game' => $game,
        ]);
    }
    public function update(\App\Models\Game $game)
    {
        $game->update(
            \request(['year','title','genre','devs','engine','platform'])
        );
        $game->save();
        return redirect('/games');
    }
    public function destroy(\App\Models\Game $game)
    {
        $game->delete();
    }
    public function show(\App\Models\Game $game)
    {
        if (is_null($game)) {
            return "Game does not exist!";
        }

        return view('games/show', [
            'game' => $game
        ]);
    }
}
