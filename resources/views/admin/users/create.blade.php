@extends('layouts.admin')

@section('content')
  <h1>Create user</h1>
  <form class="form-horizontal" method="post" action="{{ action('AdminUsersController@store') }}">
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
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="sel1">User role (select one):</label>
      <select class="form-control" id="sel1" name="role">
        <option value="1">administrator</option>
        <option value="2" selected>author</option>
        <option value="3">subscriber</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary plusten">Save</button>
    </div>
  </form>
@endsection

