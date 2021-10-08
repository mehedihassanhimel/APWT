<h1>Customer Form Page</h1>
@extends('layouts.sample')
@section('content')
<form action="{{route('customer.create')}}" method="post" class="col-md-3">
    {{csrf_field()}}
<div class="form-group" >
    <span>Name</span>
    <input type="text" class="form-control" name="name" value="{{old('name')}}"></input>
    @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br><span>Email</span>
    <input type="text" class="form-control" name="email"></input>
</div>
<input type="submit" class="btn btn-success" value="Submit">
</form>
@endsection