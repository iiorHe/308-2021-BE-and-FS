@extends("layout")
@section("app-title")
 Games
@endsection

@section("page-title")
 {{$pageTitle}}
@endsection

@section("page-content")
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
        <td>{{$game->devs}}</td>
        <td>{{$game->engine}}</td>
        <td>{{$game->platform}}</td>
    </tr>
    @endforeach
</table>
@endsection