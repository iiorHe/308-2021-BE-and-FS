@extends("layout")
@section("app-title")
 Credits
@endsection

@section("page-title")
 {{$pageTitle}}
@endsection

@section("page-content")
 <ul>
  @foreach($credits as $credit)
   <li> {{$credit->GetName()}} - {{$credit->GetPosition()}} </li>
  @endforeach
 </ul>
@endsection