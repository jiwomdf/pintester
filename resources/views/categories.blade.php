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
                    <button>Profile</button></td>
                </form>
            </td>
            <td>
                <form action="/categories">
                    <button>Categories</button>
                </form>
            </td>
        </tr>
</table>

<form action="" method="post">
    pajdwdaokwdo
</form>

</div>
@endsection