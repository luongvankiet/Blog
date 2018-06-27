@extends('manage.dashboard')
@section('manage')
<h1>Edit user</h1>
@include('layouts.errors')
<hr>
<form  method="POST" action="{{route('users.update',['id'=>$user->id])}}">
    {{method_field('PUT')}}
    @csrf
    <div class="form-group">
        <label for="Name">Name <span class="require">*</span></label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}"  />
    </div>
    
    <div class="form-group">
        <label for="email">Email <span class="require">*</span></label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
    </div>

    <div class="form-group">
        <label class="radio">
            <input type="radio" name="status[]" value="true" {{($user->active == 1) ? 'checked' : ''}}/> Activate
            <span class="checkmark"></span>
        </label>

        <label class="radio">
            <input type="radio" name="status[]" value="false" {{($user->active == 0) ? 'checked' : ''}}/> Deactivate
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default" type="button" onclick="window.location='{{route('users.index')}}'">Cancel</button>
    </div>
</form>
@endsection