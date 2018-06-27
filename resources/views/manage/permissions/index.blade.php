@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Permissions</h1></div>
</div>	
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Description</th>
      <th scope="col">Date created</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($permission as $per)
    <tr onclick="window.location='{{route('permissions.edit', ['id'=>$per->id])}}'" style="cursor: pointer;">
      <th scope="row">{{$per->id}}</th>
      <td>{{$per->display_name}}</td>
      <td>{{$per->name}}</td>
      <td>{{$per->description}}</td>
      <td>{{$per->created_at->toFormattedDateString()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$permission->links()}}</div>
@endsection