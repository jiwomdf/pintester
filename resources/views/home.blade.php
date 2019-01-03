@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <table>
        
        {{$count = 1}}
        @foreach($photos as $p)
            @if($count % 6 != 0)
            <td>
            <div style="margin:10px;">
                <a href="{{url('/PostDetail/'.$p->id)}}"> <img src="../MsPhoto/{{$p->image}}" alt="" style="heigh:200px; width:200px;"></a>
                <div>{{$p->title}}</div>
                <div>{{$p->caption}}</div>
            </div>
                
            </td>
            {{$count += 1}}
            @else
            <tr></tr>
            <td>
            <div style="margin:10px;">
            
                <a href="{{url('/PostDetail/'.$p->id)}}"> <img src="../MsPhoto/{{$p->image}}" alt="" style="heigh:200px; width:200px;margin:10px;"></a>
                <span>{{$p->title}}</span>
                <span>{{$p->caption}}</span>
            </div>
                
            </td> 
            {{$count += 1}}
            @endif
        @endforeach
    </table>
        </div>
    </div>
</div>
@endsection
