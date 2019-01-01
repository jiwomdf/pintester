
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">List Category</div>
                <form action="{{url('/doUpdate')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}} 
              <div class="panel-body">
                  <div class="col-md-6">
                  <label for="name" class="col-md-4 control-label">Category Name:</label>
                        <input type="text" name="name" placeholder="name" value="{{$category->name}}">
                     </div>
                     <div class="col-md-6">
                     <label for="id" class="col-md-4 control-label">id</label>
                     <input type="text" name="id" value="{{$category->id}}">
                     </div>
                  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Category
                                </button>
                            </div>
                        </div>
                </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection