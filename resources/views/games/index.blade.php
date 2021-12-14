@extends("layout")
@section("app-title")
 Games
@endsection

@section("page-title")
 {{$pageTitle}}
@endsection

@section("page-content")
<div class="form-group">
    <select class="browser-default custom-select" name="game-dev-filter" id="game-dev-filter">
        <option value="0">All developers</option>
        @foreach ($devs as $dev)
            <option @if(isset($dev_filter)&&($dev->id==$dev_filter->id))
                selected @endif value="{{$dev->id}}">{{$dev->name}}</option>
        @endforeach
    </select>
    <script>
        $('#game-dev-filter').change(() => {
            var id = $('#game-dev-filter').val();
            var url = "/games";
            if (id != 0) {
                url += "/dev/" + id;
            }
            location.href = url;
        });
    </script>
</div>
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