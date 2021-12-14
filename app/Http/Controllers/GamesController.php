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
    private function validateData($data)
    {
        return $this->validate($data,[
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
            'devs' => Dev::all()->sortBy('name')
        ]);
    }
    public function update(\App\Models\Game $game)
    {
        $data = $this->validateData(\request());
        $game->year = $data['game-year'];
        $game->title = $data['game-title'];
        $game->genre = $data['game-genre'];
        $game->dev()->associate(Dev::find($data['game-devs']));
        $game->engine = $data['game-engine'];
        $game->platform = $data['game-platform'];
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
