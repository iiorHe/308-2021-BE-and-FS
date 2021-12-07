@extends("layout")

@section("app-title", "Games list")
@section("page-title", "Edit game")

@section("page-content")
    <form method="post" action="/games/{{$game->id}}" class="text-left">
        @csrf

        {{ method_field("patch") }}
        <div class="form-group">
            <label for="game-year">Year</label>
            <input type="number" class="form-control" name="game-year" id="game-year" placeholder="" value="{{$game->year}}">
        </div>
        <div class="form-group">
            <label for="game-title">Title</label>
            <input type="text" class="form-control" name="game-title" id="game-title" placeholder="Title" value="{{$game->title}}">
        </div>
        <div class="form-group">
            <label for="game-genre">Genre</label>
            <input type="text" class="form-control" name="game-genre" id="game-genre" placeholder="Genre" value="{{$game->genre}}">
        </div>
        <div class="form-group">
            <label for="game-devs">Developers</label>
            <input type="text" class="form-control" name="game-devs" id="game-devs" placeholder="Developers" value="{{$game->devs}}">
        </div>
        <div class="form-group">
            <label for="game-engine">Engine</label>
            <input type="text" class="form-control" name="game-engine" id="game-engine" placeholder="Engine" value="{{$game->engine}}">
        </div>
        <div class="form-group">
            <label for="game-platform">Platform</label>
            <input type="text" class="form-control" name="game-platform" id="game-platform" placeholder="Platform" value="{{$game->platform}}">
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit</button>
    </form>
@endsection
