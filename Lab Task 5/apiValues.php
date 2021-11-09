<!DOCTYPE html>
<html>
<body>


<div id="demo">
<p>Press Button to show sales.</p>
<button type="button" onclick="loadDoc()">Show Sales</button>
</div>

<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    // document.getElementById("demo").innerHTML =
    var json = this.responseText;
    var obj_arr =JSON.parse(json);
    // console.log(obj_arr);
    console.table(obj_arr);
    // document.write(obj_arr);
  }
  xhttp.open("GET", "http://localhost:8000/api/sales");
  xhttp.send();
}
</script>

</body>
</html>
