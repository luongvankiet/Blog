@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
    	    <img src="{{asset('img/blog-img/b1.jpg')}}" class="img-thumbnail" style="width: 150px; height: 150px;">
        </div>
        
        <div class="col-md-8">
            <h3>{{$user->name}}</h3>
            <h6>Email: {{$user->email}}</h6>
            <h6>Ubication: Colombia</h6>
            <h6>Old: 1 Year</h6>
            <h6><a href="#">More... </a></h6>
        </div>

        <div class="col-md-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('users.edit',['id'=>$user->id])}}"><span class="fa fa-wrench"></span>  Edit</a>
                <form method="POST" action="{{route('users.destroy',['id'=>$user->id])}}">
                    {{method_field('DELETE')}}
                    @csrf
                    <button class="dropdown-item" type="submit"><span class="fa fa-trash"></span>  Delete</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection