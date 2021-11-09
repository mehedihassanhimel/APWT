@include('layouts2.navBar3')
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {
  background-color: #06d6a0;
}
</style>
<!--</style>  

</head>
  <body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('home')}}">Shoppers</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('products.index')}}">Products</a></li>
      <li><a href="{{route('products.index')}}">Seller's operation</a></li>

      <li><a href="/logout">Logout</a></li>
    </ul>
  </div>
</nav> -->
    <h2>Hello, {{ucfirst(session('user'))}}</h2>
    
    <!-- @php
   {{$data=session()->get('user_id');
    echo $data;}}
@endphp -->
    
    
  </body>
</html>


