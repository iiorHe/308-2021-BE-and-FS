@extends("layout")

@section("app-title", "Devs")
@section("page-title", "Game developers")

@section("page-content")
    <a href="/devs/create" class="btn btn-outline-success float-left" style="...">Add a developer</a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Year</th>
                <th scope="col">Based</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devs as $dev)
                <tr>
                    <td>{{$dev->name}}</td>
                    <td>{{$dev->year}}</td>
                    <td>{{$dev->based}}</td>
                    <td>
                        <a href="/devs/{{$dev->id}}" class="btn btn-outline-secondary">Show</a>
                        <a href="/devs/{{$dev->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection