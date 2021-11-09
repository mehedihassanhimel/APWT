
<h1>Seller Form Page</h1>
<form action="{{route('seller.registration')}}" method="post" class="col-md-3">

<div class="form-group" >
    <span>Name</span>
    <input type="text" class="form-control" name="name" value="{{old('name')}}"></input>



    <br>
    <span>ID</span>
    <input type="text" class="form-control" name="id" value="{{old('id')}}"></input>



        <br><span>Password</span>
    <input type="password" class="form-control" name="password" value="{{old('password')}}"></input>



    <br>
    <span>DOB</span>
        <input type="date" class="form-control" name="dob" value="{{old('dob')}}"></input>


        @enderror
    <br><span>Email</span>
    <input type="text" class="form-control" name="email" value="{{old('email')}}"></input>

    <br>
    <span>Phone</span>
    <input type="text" class="form-control" name="phone" value="{{old('phone')}}"></input>

    <br>
</div>
<input type="submit" class="btn btn-success" value="Submit">
</form>
