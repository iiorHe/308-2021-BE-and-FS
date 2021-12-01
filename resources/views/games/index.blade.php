@extends("layout")
@section("app-title")
 Games
@endsection

@section("page-title")
 {{$pageTitle}}
@endsection

@section("page-content")
<table>
    <tr><th>Year</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Devs</th>
        <th>Engine</th>
        <th>Platform</th>
    </tr>
    @foreach($games as $game)
    <tr>
        <td>{{$game->GetYear()}}</td>
        <td>{{$game->GetTitle()}}</td>
        <td>{{$game->GetGenre()}}</td>
        <td>{{$game->GetDevs()}}</td>
        <td>{{$game->GetEngine()}}</td>
        <td>{{$game->GetPlatform()}}</td>
    </tr>
    @endforeach
</table>
@endsection