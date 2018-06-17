@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Permissions</h1></div>
	<div class="col-md-2 mt-30"><button class="btn btn-success" onclick="window.location='{{route('permissions.create')}}'">Create new permission</button></div>
</div>	
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Date created</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($permissions as $per)
    <tr>
      <th scope="row">{{$per->id}}</th>
      <td>{{$per->display_name}}</td>
      <td>{{$per->name}}</td>
      <td>{{$per->description}}</td>
      <td>{{$per->created_at->toFormattedDateString()}}</td>
      <td>
          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button class="btn " onclick="window.location='{{route('permissions.show',['id'=>$per->id])}}'"><span class="fas fa-user-circle"></span></button>              
            </div>
            <div class="btn-group mr-2" role="group" aria-label="Second group">
              <button class="btn" onclick="window.location='{{route('permissions.edit',['id'=>$per->id])}}'"><span class="fas fa-pencil-alt"></span></button>
            </div>
            <div class="btn-group" role="group" aria-label="Third group">
              <form method="POST" action="{{route('permissions.destroy',['id'=>$per->id])}}">
              {{method_field('DELETE')}}
              @csrf
              <button class="btn" type="submit"><span class="fas fa-trash-alt"></span></button>
              </form>
            </div>
          </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$permissions->links()}}</div>
    
@endsection