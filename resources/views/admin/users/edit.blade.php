@extends('layouts.admin')

@section('content')
  <h1>Edit user</h1>

  @include('includes.form_error')

  <div class="col-sm-3">
    @if($user->photo)
      <img src="{{ $user->photo->file }}" alt="" class="img-responsive img-rounded">
    @else
      <img src="/images/no-photo.png" alt="" class="img-responsive img-rounded">
    @endif
  </div>
  <div class="col-sm-9">
    <form class="form-horizontal" method="post" action="{{ action('AdminUsersController@update', $user->id) }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="control-label" for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $user->name }}">
      </div>
      <div class="form-group">
        <label class="control-label" for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $user->email }}">
      </div>
      <div class="form-group">
        <label class="control-label" for="pwd">Old password:</label>
        <input type="password" class="form-control" autocomplete="new-password" id="pwd" placeholder="Enter old password" name="password">
      </div>
      <div class="form-group">
        <label class="control-label" for="pwd">New password:</label>
        <input type="password" class="form-control" autocomplete="new-password" id="pwd" placeholder="Enter new password" name="newpassword">
      </div>
      <div class="form-group">
        <label class="control-label" for="pwd">New password again:</label>
        <input type="password" class="form-control" autocomplete="new-password" id="pwd" placeholder="Enter new password again" name="newpasswordagain">
      </div>
      <div class="form-group">
        <label for="sel1">User role (select one):</label>
        <select class="form-control" id="sel1" name="role_id">
          @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="sel1">User Status (select one):</label>
        <select class="form-control" id="sel1" name="is_active">
          <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
          <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Inactive</option>
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
      <input type="hidden" value="{{ $user->id }}" name="id">
      <div class="form-group">
        <button type="submit" class="btn btn-primary plusten">Save</button>
      </div>
    </form>
  </div>
  
@endsection

