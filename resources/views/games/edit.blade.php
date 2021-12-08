@extends("layout")

@section("app-title", "Games list")
@section("page-title", "Edit game")

@section("page-content")
    <form method="post" action="/games/{{$game->id}}" class="text-left">
        @csrf

        {{ method_field("patch") }}
        <div class="form-group">
            <label for="game-year">Year</label>
            <input type="number" class="{{$errors->has('year')?'is-invalid':''}} form-control" name="year" id="game-year" placeholder="" value="{{ old('year') ? old('year') : $game->year}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('year') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-title">Title</label>
            <input type="text" class="{{$errors->has('title')?'is-invalid':''}} form-control" name="title" id="game-title" placeholder="Title" value="{{ old('title') ? old('title') : $game->title}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('title') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-genre">Genre</label>
            <input type="text" class="{{$errors->has('genre')?'is-invalid':''}} form-control" name="genre" id="game-genre" placeholder="Genre" value="{{ old('genre') ? old('genre') : $game->genre}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('genre') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-devs">Developers</label>
            <input type="text" class="{{$errors->has('devs')?'is-invalid':''}} form-control" name="devs" id="game-devs" placeholder="Developers" value="{{ old('devs') ? old('devs') : $game->devs}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('devs') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="form-group">
            <label for="game-engine">Engine</label>
            <select class="browser-default custom-select" name="game-engine" id="game-engine">
                <option selected disabled value="0">Select an Engine</option>
                @foreach ($engines as $engine)
                    <option @if($game->engine->id == $engine->id) selected @endif value="{{$engine->id}}">
                    {{$engine->title}}</option>
                @endforeach
            </select>
            @include('includes/validationErr', ['errFieldName' => 'game-engine'])
        </div>
        <div class="form-group">
            <label for="game-platform">Platform</label>
            <input type="text" class="{{$errors->has('platform')?'is-invalid':''}} form-control" name="platform" id="game-platform" placeholder="Platform" value="{{ old('platform') ? old('platform') : $game->platform}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach ($errors->get('platform') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </small>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit</button>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Delete
        </button>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Confirm delete action</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body text-left">
                    Delete {{ $game->title }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>

                    <button type="button" class="btn btn-danger" id="delete-game">Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function () {
            $("#delete-game").click(function () {
                var id = {!! $game->id !!} ;
                $.ajax({
                    url: '/games/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token : "{!! csrf_token() !!}"
                    },

                    success:function (msg) {
                        location.href="/games";
                    }
                });
            });
        });
    </script>
@endsection
