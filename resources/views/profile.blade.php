<style>
    td
    {
        text-align: center; vertical-align: middle;
    }
    input
    {
        padding-right:50px;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">

<table width="100%" height="50%" style="" >
        <tr><td rowspan="2"><img src="{{'pp/'.$profile['pp']}}" alt="" style="heigh:150px;width:150px;border-radius:100%;margin-top:8px;"></td> <td>{{$profile['name']}}</td></tr>
        <tr><td>{{$profile['email']}}</td></tr>
        <tr>
            <td>
                <form action="/profile">
                    <button>Profile</button>
                </form>
            </td>
            <td>
                <form action="{{url('/categories')}}">
                    <button>Categories</button>
                </form>
            </td>
        </tr>
</table>
<br>
<form action="/doUpdateProfile" method="post" enctype="multipart/form-data">
{{csrf_field()}} 
    <table  width="100%" height="50%" border="1">
        <tr>
            <td>UserID : </td>
            <td><input type="text" name="" id="" disabled="true" value="{{$profile['id']}}"></td>
        </tr>
        <tr>
            <td>Name : </td>
            <td><input type="text" name="name" id="" value="{{$profile['name']}}"></td>
        </tr>
        <tr>
            <td>Email : </td>
            <td><input type="text" name="email" id="" value="{{$profile['email']}}"></td>
        </tr>
        <tr>
            <td>Password : </td>
            <td><input type="password" name="password" id="" value="{{$profile['password']}}"></td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td>
                <select name="gender" id="" value="{{$profile['gender']}}">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><button type="submit">Save Changes</button></td>
            <td><button type="reset">Discard Changes</button></td>
        </tr>
    </table>
    <br><br>
</form>

</div>
@endsection
