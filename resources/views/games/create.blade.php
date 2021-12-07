@extends("layout")

@section("app-title", "Games list")
@section("page-title", "Create new game")

@section("page-content")
    <form method="post" action="/games" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="game-year">Year</label>
            <input type="number" class="form-control" name="game-year" id="game-year" placeholder="">
        </div>
        <div class="form-group">
            <label for="game-title">Title</label>
            <input type="text" class="form-control" name="game-title" id="game-title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="game-genre">Genre</label>
            <input type="text" class="form-control" name="game-genre" id="game-genre" placeholder="Genre">
        </div>
        <div class="form-group">
            <label for="game-devs">Developers</label>
            <input type="text" class="form-control" name="game-devs" id="game-devs" placeholder="Developers">
        </div>
        <div class="form-group">
            <label for="game-engine">Engine</label>
            <input type="text" class="form-control" name="game-engine" id="game-engine" placeholder="Engine">
        </div>
        <div class="form-group">
            <label for="game-platform">Platform</label>
            <input type="text" class="form-control" name="game-platform" id="game-platform" placeholder="Platform">
        </div>
        <button type="submit" class="btn btn-primary float-right">Add</button>
    </form>
@endsection
