<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Dev;
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
        return view('games/create',[
            'devs' => Dev::all()->sortBy('name')
        ]);
    }
    public function getList()
    {
        return \App\Models\Game::all();
    }
    public function store()
    {
        $data = request()->validate([
            'game-year' => 'required|min:4|max:4',
            'game-title' => 'required|min:4',
            'game-genre' => 'required|min:3',
            'game-devs' => 'required|exists:devs,id',
            'game-engine' => 'required',
            'game-platform' => 'required|min:2',
        ],[
            'game-year.required' => "Game year missing!",
            'game-year.min' => "Please enter a valid date",
            'game-year.max' => "Please enter a recent date",
            'game-title.required' => "Game title missing!",
            'game-title.min' => "Game title too small!",
            'game-genre.required' => "Game genre missing!",
            "game-genre.min" => "Genre name too small!",
            'game-devs.required' => "Developers missing!",
            'game-devs.exists' => "Developer does not exist!",
            'game-engine.required' => "Game engine missing!",
            'game-platform.required' => "Game platform missing!",
            'game-platform.min' => "Platform name too small!",
        ]);

        \App\Models\Game::create([
            'year'      => $data['game-year'],
            'title'     => $data['game-title'],
            'genre'     => $data['game-genre'],
            'dev_id'    => $data['game-devs'],
            'engine'    => $data['game-engine'],
            'platform'  => $data['game-platform'],
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
            \request()->validate([
                'year' => 'required|min:4|max:4',
                'title' => 'required|min:4',
                'genre' => 'required|min:3',
                'devs' => 'required',
                'engine' => 'required',
                'platform' => 'required|min:2',
            ],[
                'year.required' => "Game year missing!",
                'year.min' => "Please enter a valid date",
                'year.max' => "Please enter a recent date",
                'title.required' => "Game title missing!",
                'title.min' => "Game title too small!",
                'genre.required' => "Game genre missing!",
                "genre.min" => "Genre name too small!",
                'devs.required' => "Developers missing!",
                'engine.required' => "Game engine missing!",
                'platform.required' => "Game platform missing!",
                'platform.min' => "Platform name too small!",
            ])
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
