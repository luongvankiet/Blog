@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Users</h1></div>
	<div class="col-md-2 mt-30"><button class="btn btn-success" onclick="window.location='{{route('users.create')}}'">Create new user</button></div>
</div>	
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Date Created</th>
      <th scope="col">Roles</th>
      <th scope="col">Active</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($user as $u)
    <tr onclick="window.location='{{route('users.edit', ['id'=>$u->id])}}'" style="cursor: pointer;">
      <th scope="row">{{$u->id}}</th>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->created_at->toFormattedDateString()}}</td>
      @if($u->roles->count() != 0)
        @foreach($u->roles as $roles)
        <td>{{$roles->display_name}}</td>
        @endforeach
      @else
        <td><p>This user has no role</p></td>
      @endif
      <td style="padding-left: 30px;"><span class="{{($u->active == 1) ? 'far fa-check-square' : 'far fa-square'}}"></span></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$user->links()}}</div>
@endsection