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

    <table width="100%">
    {{$count = 1}}

    @foreach($data['category'] as $c)

    {{$isDisplay = true}}

        @if(count($data['choosenCategory']))
            @foreach($data['choosenCategory'] as $cc)
                
                {{$c->name}}

                @if($c->id == $cc->category_id)
                   {{$isDisplay = true}}
                   @break
                @else
                    
                    {{$isDisplay = false}}
                @endif
            
            @endforeach
        @else
            {{$isDisplay = false}}
        @endif


        @if($count % 3 != 0)
            <td>
            <div style="margin:10px;">
                @if($isDisplay == true)
                    <a href="{{url('/unfollCategory/'.$c->id)}}">
                        <input type="button" value="{{$cc->name}}" name="{{$cc->category_id}}" text="{{$cc->name}}" class="btn-primary" >
                    </a>
                @else
                    <a href="{{url('/returnCategory/'.$c->id)}}">
                        <input type="button" value="{{$c->name}}" name="{{$c->id}}" text="{{$c->name}}" >
                    </a>
                @endif
            </div>
                
            </td>
            {{$count += 1}}
        @else
            <td>
                @if($isDisplay == true)
                    <a href="{{url('/unfollCategory/'.$c->id)}}">
                        <input type="button" value="{{$cc->name}}" name="{{$cc->category_id}}" text="{{$cc->name}}" class="btn-primary" >
                    </a>
                @else
                    <a href="{{url('/returnCategory/'.$c->id)}}">
                        <input type="button" value="{{$c->name}}" name="{{$c->id}}" text="{{$c->name}}" >
                    </a>

                @endif
            </td>
            <tr></tr>
            {{$count += 1}}
        @endif
    @endforeach
    
    </table>

</div>
@endsection