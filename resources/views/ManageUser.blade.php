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
<br>

<table width="100%">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Gender</td>
        <td>Auth</td>
    </tr> 
    @for ($i = 0; $i <= 1; $i++)
    <tr>
        <td>
            <div value="{{ $users[$i]->id }}">{{ $users[$i]->id }}</div>
        </td>
        <td>
            <div value="{{ $users[$i]->name }}">{{ $users[$i]->name }}</div>
        </td>
        <td>
            <div value="{{ $users[$i]->email }}">{{ $users[$i]->email }}</div>
        </td>
        <td>
            <div value="{{ $users[$i]->gender }}">{{ $users[$i]->gender }}</div>
        </td>
        <td>
            <a href="/doDetailUser/{{$users[$i]->id}}">edit</a>
        </td>
    </tr>
    @endfor
    
</table>


</div>
@endsection