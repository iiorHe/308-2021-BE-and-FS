@extends("layout")

@section("app-title", "Devs")
@section("page-title", "Game developer info")

@section("page-content")
    <h2 class="text-info">{{$dev->name}}</h2>
    <h5>Founded in: {{$dev->year}}</h5>
    <h5>Based in: {{$dev->based}}</h5>
    <h5>Debut title: {{$dev->game->title}}</h5>
    <a href="/devs" style="..." class="btn btn-outline-info">Return</a>
@endsection