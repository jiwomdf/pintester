@extends('layouts.app')

@section('content')
<div class="container">

{{csrf_field()}}

<table width="100%" height="50%" style="">
    <!-- perlu ada join untuk nama usernya -->
    <tr><td style="text-align: center; vertical-align: middle;">User <button >Delete Post</button></td></tr>
    <tr><td style="text-align: center; vertical-align: middle;">{{$photos[0]->user_id}}</td></tr>
    <tr><td style="text-align: center; vertical-align: middle;">{{$photos[0]->title}}</td></tr>
    <tr><td style="text-align: center; vertical-align: middle;"><img width="300px" height="300px" src="{{url($photos[0]->image)}}" > <br></td></tr>
    <tr><td style="text-align: center; vertical-align: middle;"><h2>{{$photos[0]->caption}}</h2></td></tr>
    <tr><td style="text-align: center; vertical-align: middle;"><h4>Comments</h4></td></tr>
    <!-- disini di foreach buat load commentnya ada apa aja -->
    <tr><td style="text-align: center; vertical-align: middle;"><h4>Add your comment</h4></td></tr>
    <tr><td style="text-align: center; vertical-align: middle;"><h4><input type="text" name="" id=""></h4></td></tr>
    <tr><td style="text-align: center; vertical-align: middle;"><button type="submit">Submit</button></td></tr>
</table>


</div>
@endsection