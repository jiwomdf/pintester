@extends('layouts.app')

@section('content')

    <center>
        <form action="{{url('/doInsertPhoto')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="container">
            <table>
                <tr>
                    <td><input type="hidden" name="user_id" value="{{Auth::user()->id}}"></td>
                </tr>
                <tr>
                    <td>Title : </td>
                    <td><input type="text" name="title" id=""></td>
                </tr>
                <tr>
                    <td>Caption : </td>
                    <td><input type="text" name="caption" id=""></td>
                </tr>
                <tr>
                    <td>Image : </td>
                    <td><input type="file" name="image" id=""></td>
                </tr>
                <tr>
                    <td>Price : </td>
                    <td><input type="text" name="price" id=""></td>
                </tr>
                <tr>
                    <td>Category : </td>
                    <td>
                        <select name="category">
                        @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                        </select>
                    </td>
                </tr>
            </table>
                
            </div>
            <br>
            <button type="submit" class="btn-Warning">Add</button>
        </form>
    </center>

@endsection