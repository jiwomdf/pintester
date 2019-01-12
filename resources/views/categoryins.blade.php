@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">Insert Category</div>

            <form action="{{url('/doInsert')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}} 
              <div class="panel-body">
                  <div class="col-md-6">
                  <label for="name" class="col-md-4 control-label">Category Name:</label>
                        <input type="text" name="name" placeholder="name">
                     </div>
                  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Category
                                </button>
                            </div>
                        </div>
                </form>

    {{--text error--}}
    <div style="color:red;">
    <table>
    @if ($errors->any())
            @foreach ($errors->all() as $error)
            <tr>
                <td>{{ $error }}</td>
            </tr>
            @endforeach
        @endif
    </table>
        
    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection