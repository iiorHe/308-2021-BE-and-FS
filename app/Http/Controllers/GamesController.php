<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Dev;
class GamesController extends Controller
{
    private $dev;
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->dev = Dev::find($request->route('devid'));
        view()->share(
            'dev_filter_id',$request->route('devid')
        );
    }
    public function index($dv)
    {
        if($this->dev){
            $games = $this->dev->games->sortBy("title");
        } else {
            $games = \App\Models\Game::all()->sortBy("title");
        }

        return view('games/index',[
            'games' => $games,
            'pageTitle' => 'Games',

            'devs' => Dev::all()->sortBy('name'),
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
    public function create($dv)
    {
        return view('games/create',[
            'devs' => Dev::all()->sortBy('name')
        ]);
    }
    public function getList()
    {
        return \App\Models\Game::all();
    }
    public function store($dv)
    {
        $data = $this->validateData(request());

        \App\Models\Game::create([
            'year'      => $data['game-year'],
            'title'     => $data['game-title'],
            'genre'     => $data['game-genre'],
            'dev_id'    => $data['game-devs'],
            'engine'    => $data['game-engine'],
            'platform'  => $data['game-platform'],
        ]);
        return redirect('dev/'.$dv.'/games');
    }
    public function edit($dv, \App\Models\Game $game)
    {
        return view('games/edit',
        [
            'game' => $game,
            'devs' => Dev::all()->sortBy('name')
        ]);
    }
    public function update($dv, \App\Models\Game $game)
    {
        $data = $this->validateData(\request());
        $game->year = $data['game-year'];
        $game->title = $data['game-title'];
        $game->genre = $data['game-genre'];
        $game->dev()->associate(Dev::find($data['game-devs']));
        $game->engine = $data['game-engine'];
        $game->platform = $data['game-platform'];
        $game->save();
        return redirect('dev/'.$dv.'/games');
    }
    public function destroy($dv,\App\Models\Game $game)
    {
        $game->delete();
    }
    public function show($dv,\App\Models\Game $game)
    {
        return view('games/show',[
            'game' => $game
        ]);
    }
}
