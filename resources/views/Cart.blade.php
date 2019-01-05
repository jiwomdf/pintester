<style>
    td
    {
        text-align: center; vertical-align: middle;
    }
</style>

@extends('layouts.app')

@section('content')

<div class="container">
<h1>Cart</h1>

<form action="/insertTransaction" method="post">
{{csrf_field()}}
<table>
    {{$price = 0}}
    @foreach($cart as $c)
    <tr>
        <td rowspan="5"><img src="MsPhoto/{{$c->image}}" alt="" style="width:250px; heigh:250px;"></td>
        <input type="hidden" name="image" value="{{$c->image}}">
        <td></td>
    </tr>
    <tr><td >Image Title : {{$c->title}}  </td></tr>
    <tr><td >Image Price : {{$c->price}} </td></tr>
    <tr><td >Image Owner : {{$c->Name}} </td></tr>


    <input type="hidden" name="id" value="{{$c->id}}">
    <input type="hidden" name="title" value="{{$c->title}}">
    <input type="hidden" name="price" value="{{$c->price}}">
    <input type="hidden" name="Name" value="{{$c->Name}}">

    <tr><td><button>Remove</button></td></tr>

    </tr>

    {{$price = $price + $c->price}}

    @endforeach
</table>

<h2>Total Price are Rp. {{$price}}</h2>
<input type="hidden" name="totalPrice" value="{{$price}}">
<button type="submit">Check Out</button>
</form>

</div>
@endsection
