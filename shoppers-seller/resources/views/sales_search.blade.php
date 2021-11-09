@include('layouts2.navBar4')
<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
 </head>
 <body>
  <br />
  <!-- <div class="container box">
   <div class="panel panel-default">
    <div class="panel-body">
     <div class="form-group"> -->
      <input type="text" name="search"  id="search" width="200"  placeholder="Search Sales Data" />
     <!-- </div> -->
     <div class="table-responsive">
     <div></div>
      <p>Total Data : <span id="total_records"></span></p>
      <table class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Product Name</th>
         <th>Quantity</th>
         <th>Earning</th>
         <th>Time</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('sales_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
