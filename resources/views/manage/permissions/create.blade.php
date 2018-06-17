@extends('manage.dashboard')
@section('manage')
<h1>Create new permission</h1>
@include('layouts.errors')
<form method="POST" action="{{route('permissions.store')}}">
    @csrf

    <div class="form-group">
        <label class="radio">
            <input type="radio" name="permission_type" id="basicPermission" value="basic" onclick="myFunction()" checked> Basic permission
            <span class="checkmark"></span>
        </label>
        <label class="radio">
            <input type="radio" name="permission_type" id="crudPermission"  value="crud" onclick="myFunction()"/> CRUD permission
            <span class="checkmark"></span>
        </label>
    </div>

    <div id="basic">
        <div class="form-group">
            <label for="name">Name (Display Name)<span class="require">*</span></label>
            <input type="text" class="form-control" name="display_name" placeholder="Permission Name" value="{{ old('name') }}" />
        </div>

        <div class="form-group">
            <label for="description">Description<span class="require">*</span></label>
            <input type="text" class="form-control" name="description" placeholder="Describe what this permission does" value="{{ old('name') }}"/>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Create</button>
            <button class="btn btn-default" type="button" onclick="window.location='{{route('permissions.index')}}'">Cancel</button>
        </div>
    </div>

    <div id="crud" style="display: none;">
        <div class="form-group">
            <label for="crud_name">Resource<span class="require">*</span></label>
            <input type="text" class="form-control" name="crud_name" placeholder="Permission Name" value="{{ old('name') }}"/>
        </div>

        <div class="form-group">
            <label class="checkbox">Create
              <input type="checkbox" name="permission_crud" value="permission_create">
              <span class="checkbox_checkmark"></span>
            </label>
            <label class="checkbox">Read
              <input type="checkbox" name="permission_crud" value="permission_read">
              <span class="checkbox_checkmark"></span>
            </label>
            <label class="checkbox">Update
              <input type="checkbox" name="permission_crud" value="permission_update">
              <span class="checkbox_checkmark"></span>
            </label>
            <label class="checkbox">Delete
              <input type="checkbox" name="permission_crud" value="permission_delete">
              <span class="checkbox_checkmark"></span>
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Create</button>
            <button class="btn btn-default" type="button" onclick="window.location='{{route('permissions.index')}}'">Cancel</button>
        </div>
    </div>
</form>

<script>
    function myFunction() {
        var radio_basic = document.getElementById("basicPermission");
        var radio_crud = document.getElementById("crudPermission");
        var form_basic = document.getElementById("basic");
        var form_crud = document.getElementById("crud");
        if (radio_basic.checked == true){
            form_basic.style.display = "block";
        } else {
            form_basic.style.display = "none";
        }

        if (radio_crud.checked == true){
            form_crud.style.display = "block";
        } else {
            form_crud.style.display = "none";
        }
    }
</script>

@endsection