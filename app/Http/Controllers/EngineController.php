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
        $data = request()->validate([
            'title'         => 'required',
            'year'          => 'required',
            'devs'          => 'required',
            'lastupdate'    => 'required',
            'game_id'       => 'required',
        ],[
            'title.required'         => 'Title required',
            'year.required'          => 'Year required',
            'devs.required'          => 'Developer required',
            'lastupdate.required'    => 'Last update required',
            'game_id.required'       => 'Debut game required!',
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engine $engine)
    {
        //
    }
}
