@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">List Category</div>
                <table>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nama
            </td>
        </tr>
        @foreach($category as $c)
        <tr>
            <td>
                {{$c->id}}
            </td>
            <td>
               {{$c->name}}
            </td>
            <td>
                <a href="{{url('/formUpdateCategory/'.$c->id)}}">Update</a>
                <a href="{{url('/doDelete/'.$c->id)}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
       <a href="{{route('insertcategory')}}">Add New Categories</a>

    {{--text error--}}
    <div style="color:red;">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif
    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection