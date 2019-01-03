<style>
    td
    {
        text-align: center; vertical-align: middle;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">

<form action="/doComment" method="post" enctype="multipart/form-data">
{{csrf_field()}} 


<table width="100%" height="50%" style="">

    <input type="hidden" name="photo_id" value="{{$photos[0]->id}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

    <tr><td>User <button >Delete Post</button></td></tr>
    <tr><td>{{$photos[0]->title}}</td></tr>
    <tr><td><img width="300px" height="300px" src="{{asset('MsPhoto/'.$photos[0]->image)}}" > <br></td></tr>
    <tr><td><h2>{{$photos[0]->caption}}</h2></td></tr>
    <tr><td><h4>Comments</h4></td></tr>

    <!-- disini di foreach buat load commentnya ada apa aja -->
    {{$count = 1}}
    @foreach($comment as $c)

        <tr><td><img src="../pp/{{$c->pp}}" alt="" style="heigh:50px;width:50px;border-radius:100%;margin-top:8px; margin-right:15px;">{{$c->Name}} : {{$c->comment}}</td></tr>
        {{$count++}}
    @endforeach
    <tr><td ><h4>Add your comment</h4></td></tr>


    <tr><td><h4><input type="text" name="comment" id=""></h4></td></tr>
    <tr><td><button type="submit" value="Submit" name="btnSubmit" class="btn btn-primary">Submit</button></td></tr>
    
</table>
</form>
</div>
@endsection