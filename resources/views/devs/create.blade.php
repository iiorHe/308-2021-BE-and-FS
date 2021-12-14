@extends("layout")

@section("app-title", "Devs")
@section("page-title", "Add game developer")

@section("page-content")
    <form method="post" action="/devs" class="text-left">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}" name="name" id="name" placeholder="Enter name"
            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('name') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" value="{{old('year')}}" name="year" id="year" placeholder="Enter year"
            class="form-control {{$errors->has('year') ? 'is-invalid' : ''}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('year') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>

        <div class="form-group">
            <label for="based">Based</label>
            <input type="text" value="{{old('based')}}" name="based" id="based" placeholder="Enter location"
            class="form-control {{$errors->has('based') ? 'is-invalid' : ''}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('based') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>

        <div class="form-group">
            <label for="game">Debut game</label>
            <select class="browser-default custom-select" name="debut_game_id" id="game">
                <option selected disabled value="0">Select a game</option>
                @foreach ($games as $game)
                    <option value="{{$game->id}}">{{$game->title}}</option>
                @endforeach
            </select>
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('debut_game_id') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        
        <button type="submit" class="btn btn-primary float-right">Add</button>
        <div class="clearfix"></div>
    </form>
@endsection