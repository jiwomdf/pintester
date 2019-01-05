@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($transaction as $t)
    <table>
        <tr>
            <td>Transaction Id : {{$t->id}}</td>
        </tr>
        <tr>
            <td>Buyer : {{$t->Name}}</td>
        </tr>
        <tr>
            <td>Total Price : {{$t->price}}</td>
        </tr>
        <tr>
            <td>Transaction Date : {{$t->date}}</td>
        </tr>
        <tr>
            <table border="1">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td><img src="MsPhoto/{{$t->image}}" alt="" style="heigh:200px; width:200px;margin:10px;"></td>
                    <td>{{$t->Name}}</td>
                    <td>{{$t->price}}</td>
                </tr>
            </table>
        </tr>
    </table>
    @endforeach
    

    

    


</div>
@endsection
