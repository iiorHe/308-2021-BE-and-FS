@extends("layout")

@section("app-title", "Games list")
@section("page-title", "Edit game")

@section("page-content")
    <form method="post" action="/games/{{$game->id}}" class="text-left">
        @csrf

        {{ method_field("patch") }}
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'game-year', 'inputType' => 'number' ,'labelText' => 'Year',
                'placeHolderText' => 'Input year', 'fieldValue' => $game->year
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'game-title', 'inputType' => 'text' ,'labelText' => 'Title',
                'placeHolderText' => 'Input title', 'fieldValue' => $game->title
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'game-genre', 'inputType' => 'text' ,'labelText' => 'Genre',
                'placeHolderText' => 'Input genre', 'fieldValue' => $game->genre
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'game-devs', 'inputType' => 'text' ,'labelText' => 'Devs',
                'placeHolderText' => 'Input Devs', 'fieldValue' => $game->devs
            ])
        </div>
        <div class="form-group">
            <label for="game-engine">Engine</label>
            <select class="browser-default custom-select" name="game-engine"
                    id="game-engine">
                <option selected disabled value="0">Select Engine</option>
                @foreach($engines as $engine)
                    <option @if($game->engine->id == $engine->id) selected @endif
                    value="{{ $engine->id }}">{{ $engine->title }}</option>
                @endforeach

            </select>

            @include('includes/validationErr', ['errFieldName' => "game-engine"])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'game-platform', 'inputType' => 'text' ,'labelText' => 'Platform',
                'placeHolderText' => 'Input platform', 'fieldValue' => $game->platform
            ])
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
