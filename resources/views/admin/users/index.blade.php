@extends('layouts.admin')

@section('content')
  <h1 class="admin-userlist-title">Users</h1>
  <div class="row">
      <div class="col-lg-1 user-list-item"><strong>ID</strong></div>
      <div class="col-lg-2 user-list-item"><strong>Name</strong></div>
      <div class="col-lg-2 user-list-item"><strong>Role</strong></div>
      <div class="col-lg-2 user-list-item"><strong>Email</strong></div>
      <div class="col-lg-1 user-list-item"><strong>Status</strong></div>
      <div class="col-lg-2 user-list-item"><strong>Regdate</strong></div>
      <div class="col-lg-2 user-list-item"><strong>Updated</strong></div>
    @if($users)
      @foreach($users as $user)
        <div class="col-lg-1 user-list-item">{{ $user->id }}</div>
        <div class="col-lg-2 user-list-item">{{ $user->name }}</div>
        <div class="col-lg-2 user-list-item">{{ $user->role['name'] }}</div>
        <div class="col-lg-2 user-list-item">{{ $user->email }}</div>
        <div class="col-lg-1 user-list-item">{{ $user->is_active }}</div>
        <div class="col-lg-2 user-list-item">{{ $user->created_at->diffForHumans() }}</div>
        <div class="col-lg-2 user-list-item">{{ $user->updated_at->diffForHumans() }}</div>
      @endforeach
    @endif
  </div>
  <br><br><br>
  <table class="table table-hover">
    <thead>
    <tr>
      <th class="user-list-item">ID</th>
      <th class="user-list-item">Name</th>
      <th class="user-list-item">Role</th>
      <th class="user-list-item">Email</th>
      <th class="user-list-item">Status</th>
      <th class="user-list-item">Regdate</th>
      <th class="user-list-item">Updated</th>
    </tr>
    </thead>
    <tbody>
    @if($users)
      @foreach($users as $user)
        <tr>
          <td class="user-list-item">{{ $user->id }}</td>
          <td class="user-list-item">{{ $user->name }}</td>
          <td class="user-list-item">{{ $user->role['name'] }}</td>
          <td class="user-list-item">{{ $user->email }}</td>
          <td class="user-list-item">{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
          <td class="user-list-item">{{ $user->created_at }}</td>
          <td class="user-list-item">{{ $user->updated_at }}</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection