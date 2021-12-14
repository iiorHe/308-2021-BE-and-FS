@extends("layout")

@section("app-title", "Devs")
@section("page-title", "Add game developer")

@section("page-content")
    <form method="post" action="/devs" class="text-left">
        {{ csrf_field() }}

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'name', 'labelText' => 'Name',
                'placeHolderText' => 'Enter name', 'inputType' => 'text'
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'year', 'labelText' => 'Year',
                'placeHolderText' => 'Enter year', 'inputType' => 'number'
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'based', 'labelText' => 'Based',
                'placeHolderText' => 'Enter location', 'inputType' => 'text'
            ])
        </div>

        <div class="form-group">
            <label for="game">Debut game</label>
            <select class="browser-default custom-select" name="debut_game_id" id="game">
                <option selected disabled value="0">Select a game</option>
                @foreach ($games as $game)
                    <option value="{{$game->id}}">{{$game->title}}</option>
                @endforeach
            </select>
            @include('includes/validationErr',['errFieldName' => "debut_game_id"])
        </div>
        
        <button type="submit" class="btn btn-primary float-right">Add</button>
        <div class="clearfix"></div>
    </form>
@endsection