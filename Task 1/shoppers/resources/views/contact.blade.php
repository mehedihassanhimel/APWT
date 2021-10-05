<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('home')}}">Shoppers</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('product')}}">Products</a></li>
      <li><a href="{{route('ourTeam')}}">Our Team</a></li>
      <li><a href="{{route('about')}}">About Us</a></li>
      <li class="active"><a href="{{route('contact')}}">Contact Us</a></li>
    </ul>
  </div>
</nav>
    <h2>Contact Us</h2>
    Phone: {{$number}} <br>
    Address: {{$address}}
  </body>
</html>


