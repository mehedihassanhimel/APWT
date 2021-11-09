
@extends('layouts2.navBar2')
@section('content')
<h1>Seller Login Page</h1>
<form action="{{route('seller.login')}}" method="post" class="col-md-3">
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
<br><br>
@error('loginFailed')
        <span class="text-danger">{{$message}}</span>
        @enderror
</form>
<br>

@endsection
