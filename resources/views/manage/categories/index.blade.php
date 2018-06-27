@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Categories</h1></div>
	<div class="col-md-2 mt-30"><button class="btn btn-success" onclick="window.location='{{route('categories.create')}}'">Create new category</button></div>
</div>	
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Date Created</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($category as $c)
    <tr onclick="window.location='{{route('categories.edit', ['id'=>$c->id])}}'" style="cursor: pointer;">
      <th scope="row">{{$c->id}}</th>
      <td>{{$c->category_name}}</td>
      <td>{{$c->category_slug}}</td>
      <td>{{$c->created_at->toFormattedDateString()}}</td>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$category->links()}}</div>
@endsection