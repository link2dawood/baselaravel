@extends('layouts.header')
@section('content')
<style>
.form{
  border-radius: 10px;
  box-shadow:  20px 20px 60px #bebebe,
  -20px -20px 60px #ffffff;
} 
</style>
<div class="container">
  <form method="post" action="{{$action}}" class="form border p-5" enctype="multipart/form-data" data-action="make_ajax_file" data-action-after="reload">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-12">
        <h2>Edit User</h2>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{@$row['name']}}">
      </div>
      <div class="form-group col-md-12">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{@$row['email']}}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputState">Role</label>
        <select id="inputState" class="form-control" name="role">
          <option selected>Choose...</option>
          <option value="1" @if(@$row['role'] == '1')selected="" @endif>Admin</option>
          <option value="2" @if(@$row['role'] == '2') selected="" @endif>User</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="profile">Profile Image</label>
        <input type="file" class="form-control" id="profile" name="profile" value="{{@$row['profile']}}" style="height: 43px;">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection