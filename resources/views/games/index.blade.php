@extends("layout")
@section("app-title")
 Games
@endsection

@section("page-title")
 {{$pageTitle}}
@endsection

@section("page-content")
<a href="/games/create" class="btn btn-outline-success float-left" style="margin-bottom: 10px;">Add new game</a>
<table class="table table-striped table-dark">
    <tr><th>Year</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Devs</th>
        <th>Engine</th>
        <th>Platform</th>
    </tr>
    @foreach($games as $game)
    <tr>
        <td>{{$game->year}}</td>
        <td>{{$game->title}}</td>
        <td>{{$game->genre}}</td>
        <td>{{$game->dev->name}}</td>
        <td>{{$game->engine}}</td>
        <td>{{$game->platform}}</td>
        <td>
            <a href="/games/{{ $game->id }}" class="btn btn-outline-secondary">Show</a>
            <a href="/games/{{ $game->id }}/edit" class="btn btn-outline-primary">Edit</a> </td>
    </tr>
    @endforeach
</table>
@endsection