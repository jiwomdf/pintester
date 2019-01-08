<style>
    td
    {
        text-align: center; vertical-align: middle;
    }
</style>

@extends('layouts.app')

@section('content')

<div class="container">

<h1>User</h1>

{{dd($users[0]['id'])}}

@foreach($users on $u)
    <table>
        <tr>
            <td>{{$u['id']}}</td>
            <td>{{$u['name']}}</td>
            <td>{{$u['email']}}</td>
            <td>{{$u['gender']}}</td>
        </tr>
    </table>    
@endforeach

</div>
@endsection