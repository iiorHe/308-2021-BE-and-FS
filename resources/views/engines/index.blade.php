@extends("layout")

@section("app-title", "Engines")
@section("page-title", "List of engines")

@section("page-content")
    <a href="/engines/create" class="btn btn-outline-success float-left" style="...">Add Engine</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Year</th>
            <th scope="col">Devs</th>
            <th scope="col">Last Updated</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($engines as $engine)
            <tr>
                <td>{{ $engine->title }}</td>
                <td>{{ $engine->year }}</td>
                <td>{{ $engine->devs }}</td>
                <td>{{ $engine->lastupdate}}</td>
                <td><a href="/engines/{{ $engine->id }}"
                class="btn btn-outline-secondary">Show</a>
                <a href="/engines/{{ $engine->id }}/edit"
                class="btn btn-outline-primary">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
