@extends('manage.dashboard')
@section('manage')
<div class="row">
    <div class="col-md-8">
        <h1>{{$role->display_name}}</h1> <span><i>({{$role->description}})</i></span>
    </div>
    <div class="col-md-4">
        <div class="dropdown" style="margin-top: 50px; float: right">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('roles.edit',['id'=>$role->id])}}"><span class="fa fa-wrench"></span>  Edit</a>
                <form method="POST" action="{{route('roles.destroy',['id'=>$role->id])}}">
                    {{method_field('DELETE')}}
                    @csrf
                    <button class="dropdown-item" type="submit"><span class="fa fa-trash"></span>  Delete</button>
                </form>
              </div>
            </div>
        </div>
</div>
<hr>
<div class="container-fluid">
    <h3>Permission</h3>
    <ul>
        @foreach($role->permissions as $per)
            <li><span class="fa fa-dot-circle"></span> {{$per->display_name}}</li>
        @endforeach
    </ul>
</div>
@endsection