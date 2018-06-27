@extends('home')
@section('side')
<div class="col-md-8">
  <div class="card">
    <div class="card-header">  <h4 >User Profile</h4></div>
    <div class="card-body">
      <form id="udpateProfile" action="{{route('profile.update', ['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
      <div align="center">
        @if($user->avatar == null)
          <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="rounded-circle" width="100px"/>
        @else
          <img src="data:image/png;base64, {{$user->avatar}}" class="rounded-circle" width="100px"/>
        @endif
      </div>
      <br>
      <hr style="margin:5px 0 5px 0;">
                
      <div class="form-group row">   
        <label for="avatar" class="col-md-4 tital">Avatar:</label>
        <input type="file" name="avatar" class="form-control col-md-8" />
      </div> 
      <hr>
      <div class="form-group row">   
        <label for="name" class="col-md-4 tital">Name:</label>
        <input type="text" name="name" class="form-control col-md-8" value="{{$user->name}}">
      </div>  
      <hr>
      <div class="form-group row">   
        <label for="email" class="col-md-4 tital">Email:</label>
        <input type="email" name="email" class="form-control col-md-8" value="{{$user->email}}">
      </div>  
      <hr>
      <div class="form-group row">   
        <label for="nickname" class="col-md-4 tital">Nickname:</label>
        <input type="text" name="nickname" class="form-control col-md-8" value="{{$user->nickname}}">
      </div>
      <hr>
      <div class="form-group row">   
        <label for="date_of_birth" class="col-md-4 tital">Date of birth:</label>
        <input type="date" name="date_of_birth" class="form-control col-md-8" value="{{$user->date_of_birth}}">
      </div>
    </form>

      <div class="card-footer">
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-success btn-block" onclick="document.getElementById('udpateProfile').submit()">Save</button>
          </div>
          <div class="col-md-6">
            <button class="btn btn-block" onclick="window.location='{{route('profile',['id'=>$user->id])}}'">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection