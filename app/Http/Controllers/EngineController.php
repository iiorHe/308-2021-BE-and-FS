<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use App\Models\Game;
use Illuminate\Http\Request;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('engines/index',[
            'engines' => Engine::all()->sortBy('title')
        ]);
    }

    private function validateData($data)
    {
        return $this->validate($data, [
            'title'     => 'required|min:3',
            'year'      => 'required|min:4|max:4',
            'devs'      => 'required|min:2',
            'lastupdate'=> 'required',
            'game_id'   => 'required|exists:games,id'
        ],[
            'title.required' => 'Title required!',
            'title.min' => 'Title too small!',
            'year.required' => 'Year required!',
            'year.min' => 'Please use a valid date',
            'year.max' => 'Please choose a more recent date',
            'devs.required' => 'Developers required!',
            'devs.min' => 'Studio name too small!',
            'lastupdate.required'   => 'Latest update required!',
            'game_id.required' => "Game required!",
            'game_id.exists' => "Selection non-existent!"

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('engines/create',[
            'games' => Game::all()->sortBy('title')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $this->validateData($request);
        \App\Models\Engine::create($data);
        return redirect('engines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function show(Engine $engine)
    {
        return view('engines/show', [
            'engine'=>$engine
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function edit(Engine $engine)
    {
        return view('engines/edit',[
            'engine' => $engine,
            'games' => Game::all()->sortBy('title')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Engine $engine)
    {
        $data = $this->validateData(\request());

        $engine->title = $data['title'];
        $engine->year = $data['year'];
        $engine->devs = $data['devs'];
        $engine->lastupdate = $data['lastupdate'];

        $game = Game::find($data['game_id']);
        $engine->game()->associate($game);

        $engine->save();

        return redirect('/engines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engine $engine)
    {
        $engine->delete();
    }
}
