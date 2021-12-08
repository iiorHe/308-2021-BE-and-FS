@extends("layout")

@section("app-title")
    List of games
@endsection

@section("page-title")
    View game data
@endsection

@section("page-content")

    <h2>Year {{ $game->year }}</h2>
    <h3>Title {{ $game->title }}</h3>
    <h5>Genre {{ $game->genre }}</h5>
    <h5>Developers {{ $game->devs }}</h5>
    <h5>Engine {{ $game->engine->title }}</h5>
    <h5>Platform {{ $game->platform }}</h5>

    <a href="/games" style="margin-top: 30px;"
       class="btn btn-outline-info">Return to list</a>
@endsection
