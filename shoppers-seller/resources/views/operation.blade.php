
@include('layouts2.navBar4')

<table class="table table-borded">
    <tr>
        <th>Product Name</th>
        <th>Operation</th>
        <th>Time</th>
    </tr>
    @foreach($operations as $operation)
    <tr>
        <td>{{$operation->name}}</td>
        <td>{{$operation->operation}}</td>
        <td>{{$operation->time}}</td>

    </tr>
    @endforeach
</table>
