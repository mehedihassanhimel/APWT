
@extends('layouts.navBar')
@section('content')
<h1>Customer Login Page</h1>
<form action="{{route('customer.login')}}" method="post" class="col-md-3">
    {{csrf_field()}}
<div class="form-group" >
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
    
</div>
<input type="submit" class="btn btn-success" value="Login">
</form>
@endsection