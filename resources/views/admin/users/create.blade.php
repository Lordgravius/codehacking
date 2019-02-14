@extends('layouts.admin')

@section('content')
  <h1>Create user</h1>
  
  @include('includes.form_error')

  <form class="form-horizontal" method="post" action="{{ action('AdminUsersController@store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label class="control-label" for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label class="control-label" for="pwd">Password:</label>
      <input type="password" class="form-control" autocomplete="new-password" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-group">
      <label for="sel1">User role (select one):</label>
      <select class="form-control" id="sel1" name="role_id">
        <option selected>Choose one</option>
        @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="sel1">User Status (select one):</label>
      <select class="form-control" id="sel1" name="is_active">
        <option value="1">Active</option>
        <option value="0" selected>Inactive</option>
      </select>
    </div>
    <div class="input-group">
      <div class="input-group-prepend formboldtitle">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload file:</span>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="photo_id">
        {{--<label class="custom-file-label" for="inputGroupFile01">Choose file</label>--}}
      </div>
      <br>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary plusten">Save</button>
    </div>
  </form>
@endsection

