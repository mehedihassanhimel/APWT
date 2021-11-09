
@include('layouts2.navBar4')

<table class="table table-bordered table-striped">
<h3>Sales</h3><br>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Earning</th>
        <th>Time</th>
    </tr>
    <?php $total = 0 ?>
    <?php $qty = 0 ?>
    @foreach($sales as $sale)
    <?php $total += $sale->earning ?>
    <?php $qty += $sale->qty ?>
    <tr>
        <td>{{$sale->product_name}}</td>
        <td>{{$sale->qty}}</td>
        <td>{{$sale->earning}}</td>
        <td>{{$sale->time}}</td>
    
    </tr>

    @endforeach
    <td><strong>Total</td></strong>
    <td><strong>{{ $qty }}</strong></td>
    <td><strong>${{ $total }}</strong></td>
    <td></td>
</table>

       <p></p>
      