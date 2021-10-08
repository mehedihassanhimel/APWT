@extends('layouts.sample')
@section('content')
<table class="table table-borded">
    <tr>
        <th>Name</th>
        <th>ID</th>
        <th>DOB</th>
    </tr>
    @foreach($customers as $customer)
    <tr>
        <td>{{$customer->name}}</td>
        <td>{{$customer->id}}</td>
        <td>{{$customer->dob}}</td>
        <td><a href="/customer/edit{{$customer->id}}">Edit</a></td>
    </tr>
    @endforeach
</table>
@endsection