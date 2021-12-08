@extends("layout")

@section("app-title", "Games list")
@section("page-title", "Create new game")

@section("page-content")
    <form method="post" action="/games" class="text-left">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="game-year">Year</label>
            <input type="number" value="{{old('game-year')}}" class="form-control {{$errors->has('game-year') ? 'is-invalid' : "" }}" name="game-year" id="game-year" placeholder="">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-year') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-title">Title</label>
            <input type="text" value="{{old('game-title')}}" class="form-control {{$errors->has('game-title') ? 'is-invalid' : "" }}" name="game-title" id="game-title" placeholder="Title">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-title') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-genre">Genre</label>
            <input type="text" value="{{old('game-genre')}}" class="form-control {{$errors->has('game-genre') ? 'is-invalid' : "" }}" name="game-genre" id="game-genre" placeholder="Genre">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-genre') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-devs">Developers</label>
            <input type="text" value="{{old('game-devs')}}" class="form-control {{$errors->has('game-devs') ? 'is-invalid' : "" }}" name="game-devs" id="game-devs" placeholder="Developers">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-devs') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-engine">Engine</label>
            <input type="text" value="{{old('game-engine')}}" class="form-control {{$errors->has('game-engine') ? 'is-invalid' : "" }}" name="game-engine" id="game-engine" placeholder="Engine">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-engine') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-platform">Platform</label>
            <input type="text" value="{{old('game-platform')}}" class="form-control {{$errors->has('game-platform') ? 'is-invalid' : "" }}" name="game-platform" id="game-platform" placeholder="Platform">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('game-platform') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </small>
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
