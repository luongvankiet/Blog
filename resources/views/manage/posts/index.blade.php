@extends('manage.dashboard')
@section('manage')
@include('layouts.errors')
<div class="row">
	<div class="col-md-10"><h1>Manage Posts</h1></div>
</div>	
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Content</th>
      <th scope="col">Date Created</th>
      <th scope="col">Categories</th>
      <th scope="col">Active</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($post as $p)
    <tr onclick="window.location='{{route('manage_posts.edit', ['id'=>$p->id])}}'" style="cursor: pointer;">
      <th scope="row">{{$p->id}}</th>
      <td>{!!str_limit($p->title, 20, '...')!!}</td>
      <td>{!!str_limit($p->slug, 20, '...')!!}</td>
      <td>{!!str_limit($p->content, 20, '...')!!}</td>
      <td>{!!$p->created_at->toFormattedDateString()!!}</td>
      <td>
        {{$p->categories->category_name}}
      </td>
      <td style="padding-left: 30px;"><span class="{{($p->active == 1) ? 'far fa-check-square' : 'far fa-square'}}"></span></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mx-auto">{{$post->links()}}</div>
@endsection