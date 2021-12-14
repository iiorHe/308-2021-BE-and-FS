@extends("layout")

@section("app-title", "Games")
@section("page-title", "Edit game")

@section("page-content")
    <form method="post" action="/games/{{$game->id}}" class="text-left">
        @csrf
        {{method_field("patch")}}
        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-year', 'labelText' => 'Year',
                'placeHolderText' => 'Enter year', 'inputType' => 'number',
                'fieldValue' => $game->year,
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-title', 'labelText' => 'Title',
                'placeHolderText' => 'Enter title', 'inputType' => 'text',
                'fieldValue' => $game->title,
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-genre', 'labelText' => 'Genre',
                'placeHolderText' => 'Enter genre', 'inputType' => 'text',
                'fieldValue' => $game->genre,
            ])
        </div>

        <div class="form-group">
            <label for="game-devs">Developer</label>
            <select class="browser-default custom-select" name="game-devs" id="game-devs">
                <option selected disabled value="0">Select a developer</option>
                @foreach ($devs as $dev)
                    <option @if($game->dev->id == $dev->id) selected @endif
                        value="{{$dev->id}}">{{$dev->name}}</option>
                @endforeach
            </select>
            @include('includes/validationErr',['errFieldName' => "game-devs"])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-engine', 'labelText' => 'Engine',
                'placeHolderText' => 'Enter engine', 'inputType' => 'text',
                'fieldValue' => $game->engine,
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'game-platform', 'labelText' => 'Platform',
                'placeHolderText' => 'Enter platform', 'inputType' => 'text',
                'fieldValue' => $game->platform,
            ])
        </div>
        
        <button type="submit" class="btn btn-primary float-right">Edit</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Confirm action</p>
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
