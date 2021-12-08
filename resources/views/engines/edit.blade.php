@extends("layout")

@section("app-title", "Engines")
@section("page-title", "Edit engine")

@section("page-content")
    <form method="post" action="/engines/{{ $engine->id }}" class="text-left">
        @csrf
        @method("patch")
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'title',
                'labelText' => 'Title',
                'placeHolderText'=>'Input title',
                'fieldValue' => $engine->title,
                'inputType' => 'text'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'year',
                'labelText' => 'Year',
                'placeHolderText'=>'Input year',
                'fieldValue' => $engine->year,
                'inputType' => 'number'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'devs',
                'labelText' => 'Devs',
                'placeHolderText'=>'Input Devs',
                'fieldValue' => $engine->devs,
                'inputType' => 'text'
            ])
        </div>
        <div class="form-group">
            @include("includes/input", [
                'fieldId' => 'lastupdate',
                'labelText' => 'Last update',
                'placeHolderText'=>'Input last update',
                'fieldValue' => $engine->lastupdate,
                'inputType' => 'date'
            ])
        </div>
        <div class="form-group">
            <label for="game">Game</label>

            <select class="browser-default custom-select" name="game_id"
                    id="game">
                <option disabled value="0">Choose game</option>
                @foreach($games as $game)
                    <option @if($engine->game->id == $game->id) selected @endif
                    value="{{ $game->id }}">{{ $game->title}}</option>
                @endforeach
            </select>
            @include("includes/validationErr", ['errFieldName' => "game_id"])
        </div>

        <button type="submit" class="btn btn-primary float-right">Edit</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Confirm action</p>
                    </h5>
                    <button type="button" class="close"
                            data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body text-left">
                    Delete {{ $engine->title}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-dismiss="modal">No</button>

                    <button type="button" class="btn btn-danger"
                            id="delete-author">Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function () {
            $("#delete-engine").click(function () {
                var id = {!! $engine->id !!} ;
                $.ajax({
                    url: '/engines/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token : "{!! csrf_token() !!}"
                    },

                    success:function (msg) {
                        location.href="/engines";
                    }
                });
            });
        });
    </script>
@endsection
