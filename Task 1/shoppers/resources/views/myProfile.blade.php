<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  </head>
  <body>
    <a class="btn btn-primary" href="{{route('contact')}}">Contact</a>

    <h1>My Profile</h1>
<h2><?php echo $name;?></h2>

<table>
    <?php
        foreach($names as $name){
            echo "<tr>";
            echo "<td>".$name."</td>";
            echo "</tr>";
        }
    ?>


</table>
<h2>{{$id}}</h3>
<h2>Second Heading</h2> 
<table>
    @foreach($names as $name)
    <tr><td>{{$name}}</td></tr>
    @endforeach
</table>
  </body>
</html>




