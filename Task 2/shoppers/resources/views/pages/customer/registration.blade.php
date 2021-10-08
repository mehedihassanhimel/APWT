@extends('layouts.navBar')
@section('content')
<h1>Customer Form Page</h1>
<form action="{{route('customer.registration')}}" method="post" class="col-md-3">
    {{csrf_field()}}
<div class="form-group" >
    <span>Name</span>
    <input type="text" class="form-control" name="name" value="{{old('name')}}"></input>
    @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br>
    <span>ID</span>
    <input type="text" class="form-control" name="id" value="{{old('id')}}"></input>
    @error('id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <br><span>Password</span>
    <input type="password" class="form-control" name="password" value="{{old('password')}}"></input>
    @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br>
    <span>DOB</span>
        <input type="date" class="form-control" name="dob" value="{{old('dob')}}"></input>
    @error('dob')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br><span>Email</span>
    <input type="text" class="form-control" name="email" value="{{old('email')}}"></input>
    @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br>
    <span>Phone</span>
    <input type="text" class="form-control" name="phone" value="{{old('phone')}}"></input>
    @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br>
</div>
<input type="submit" class="btn btn-success" value="Submit">
</form>
@endsection