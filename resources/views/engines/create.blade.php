@extends("layout")

@section("app-title", "Engines")
@section("page-title", "Add new Engine")

@section("page-content")

    <form method="post" action="/engines" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'title',
                'labelText' => 'Title',
                'placeHolderText'=>'Input title',
                'inputType' => 'text'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'year',
                'labelText' => 'Year',
                'placeHolderText'=>'Input year',
                'inputType' => 'number'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'devs',
                'labelText' => 'Devs',
                'placeHolderText'=>'Input Devs',
                'inputType' => 'text'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'lastupdate',
                'labelText' => 'Last update',
                'placeHolderText'=>'Input last update',
                'inputType' => 'date'
            ])
        </div>
        <div class="form-group">
            <label for="game">Game</label>
            <select class="browser-default custom-select" name="game_id" id="game">
                <option selected disabled value="0">Choose game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                    @endforeach
            </select>
            @include("includes/validationErr", ['errFieldName' => "game_id"])
        </div>
        <button type="submit" class="btn btn-primary float-right">Add</button>
        <div class="clearfix"></div>
    </form>
@endsection
