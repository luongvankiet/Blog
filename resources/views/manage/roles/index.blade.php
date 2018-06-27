@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Roles</h1></div>
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
  	@foreach($role as $r)
    <tr onclick="window.location='{{route('roles.edit', ['id'=>$r->id])}}'" style="cursor: pointer;">
      <th scope="row">{{$r->id}}</th>
      <td>{{$r->display_name}}</td>
      <td>{{$r->name}}</td>
      <td>{{$r->description}}</td>
      <td>{{$r->created_at->toFormattedDateString()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$role->links()}}</div>
    
@endsection