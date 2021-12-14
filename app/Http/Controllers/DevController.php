<?php

namespace App\Http\Controllers;

use App\Models\Dev;
use App\Models\Game;
use Illuminate\Http\Request;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('devs/index',[
            'devs' => Dev::all()->sortBy("title")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devs/create',[
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
            'name' => 'required',
            'year' => 'required',
            'based' => 'required',
            'debut_game_id' => 'required|exists:games,id'
        ],[
            'name.required' => 'Name required!',
            'year.required' => 'Year required!',
            'based.required' => 'Location required!',
            'debut_game_id.required' => 'Debut title required!',
            'debut_game_id.exists' => 'Error! Game does not exist.'
        ]);
        \App\Models\Dev::create($data);
        return redirect('/devs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dev  $dev
     * @return \Illuminate\Http\Response
     */
    public function show(Dev $dev)
    {
        return view('devs/show',[
            'dev' => $dev
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dev  $dev
     * @return \Illuminate\Http\Response
     */
    public function edit(Dev $dev)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dev  $dev
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dev $dev)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dev  $dev
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dev $dev)
    {
        //
    }
}
