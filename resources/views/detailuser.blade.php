<style>
    td
    {
        text-align: center; vertical-align: middle;
    }
</style>

@extends('layouts.app')

@section('content')

<div class="container">
<center>


    <form action="/doChangeUser" method="post">
    {{csrf_field()}}
    <table width="100%">
        <tr>
            <td><img src="{{'../pp/'.$profile->pp}}" alt="" style="heigh:200px;width:200px;border-radius:100%;margin-top:8px;" name="pp"></td>
        <tr>
            <td>Id : <input type="text" value="{{$profile->id}}" disabled="true"></td>
        </tr>
        <tr>
            <td>Name : <input type="text" value="{{$profile->name}}" name="name"></td>
        </tr>
        <tr>
            <td>Email : <input type="text" value="{{$profile->email}}" name="email"></td>
        </tr>
        <tr>
            <td>Gender : <select name="gender" id=""> <option value="Male">Male</option> <option value="Female">Female</option></select> </td>
        </tr>
    </table>

    <br>
        <input type="hidden" name="id" value="{{$profile->id}}">
        <button type="reset">Discard Changes</button>
        <button name="btn" value="2">Save Changes</button>

        <form action="/doDeleteUser" method="post">
            <button name="btn" value="3">Delete Changes</button>
            <input type="hidden" name="{{$profile->id}}">
        </form>
    </form>
</center>

</div>
@endsection