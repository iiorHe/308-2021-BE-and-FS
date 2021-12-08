@extends("layout")

@section("app-title", "Engines")
@section("page-title", "Engine overview")

@section("page-content")

    <h2 class="text-info">Title {{ $engine->title }}</h2>
    <h4>Year {{ $engine->year }}</h4>
    <h4>Devs {{ $engine->devs }}</h4>
    <h4>Last Update {{ $engine->lastupdate }}</h4>
    <h4>Debut game  {{ $engine->game->title }}</h4>
    <a href="/engines" style="..." class="btn btn-outline-info">Return to list</a>
@endsection
