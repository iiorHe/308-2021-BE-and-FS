@extends("layout")

@section("app-title", "Games")
@section("page-title", "Create new game")

@section("page-content")
    <form method="post" action="/games" class="text-left">
        {{ csrf_field() }}

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-year', 'labelText' => 'Year',
                'placeHolderText' => 'Enter year', 'inputType' => 'number',
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-title', 'labelText' => 'Title',
                'placeHolderText' => 'Enter title', 'inputType' => 'text',
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-genre', 'labelText' => 'Genre',
                'placeHolderText' => 'Enter genre', 'inputType' => 'text',
            ])
        </div>

        <div class="form-group">
            <label for="game-devs">Developer</label>
            <select class="browser-default custom-select" name="game-devs" id="game-devs">
                <option selected disabled value="0">Select a developer</option>
                @foreach ($devs as $dev)
                    <option value="{{$dev->id}}">{{$dev->name}}</option>
                @endforeach
            </select>
            @include('includes/validationErr',['errFieldName' => "dev_id"])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-engine', 'labelText' => 'Engine',
                'placeHolderText' => 'Enter engine', 'inputType' => 'text',
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-platform', 'labelText' => 'Platform',
                'placeHolderText' => 'Enter platform', 'inputType' => 'text',
            ])
        </div>
       
        <button type="submit" class="btn btn-primary float-right">Add</button>
        <div class="clearfix"></div>
        @if ($errors->any())
        <div class="row border border-danger rounded text-danger" style="margin: 20px; padding: 10px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                    
                @endforeach
            </ul>
        </div>
        @endif
    </form>
@endsection
