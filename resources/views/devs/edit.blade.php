@extends("layout")

@section("app-title", "Devs")
@section("page-title", "Edit developer")

@section("page-content")
    <form method="post" action="/devs/{{$dev->id}}" class="text-left">
        @csrf
        @method("patch")

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'name', 'labelText' => 'Name',
                'placeHolderText' => 'Enter name', 'inputType' => 'text',
                'fieldValue' => $dev->name
            ])
        </div>

        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'year', 'labelText' => 'Year',
                'placeHolderText' => 'Enter year', 'inputType' => 'number',
                'fieldValue' => $dev->year
            ])
        </div>
        
        <div class="form-group">
            @include("includes/input",[
                'fieldId' => 'based', 'labelText' => 'Based',
                'placeHolderText' => 'Enter location', 'inputType' => 'text',
                'fieldValue' => $dev->based
            ])
        </div>

        <div class="form-group">
            <label for="game">Debut game</label>
            <select class="browser-default custom-select" name="debut_game_id" id="game">
                <option selected disabled value="0">Select a game</option>
                @foreach ($games as $game)
                    <option @if($dev->game->id == $game->id) selected @endif value="{{$game->id}}">{{$game->title}}</option>
                @endforeach
            </select>
            @include('includes/validationErr',['errFieldName' => "debut_game_id"])
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
                    Delete {{ $dev->name }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-dismiss="modal">No</button>

                    <button type="button" class="btn btn-danger"
                            id="delete-dev">Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        $( document ).ready(function () {
            $("#delete-dev").click(function () {
                var id = {!! $dev->id !!} ;
                $.ajax({
                    url: '/devs/' + id,
                    type: 'post',
                    data: {
                        _method: 'delete',
                        _token : "{!! csrf_token() !!}"
                    },

                    success:function (msg) {
                        location.href="/devs";
                    }
                });
            });
        });
    </script>
@endsection