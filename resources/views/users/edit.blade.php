@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">Edit user</div>
  <div class="card-body">

    <form action="{{ route('users.update') }}" method="post">
      {!! csrf_field() !!}
      <input type="hidden" name="id" id="id" value="{{ $user->getId() }}" id="id" />
      <label>Username</label></br>
      <input type="text" name="username" id="username" value="{{ $user->getUsername() }}" class="form-control"></br>
      <label>Email</label></br>
      <input type="text" name="email" id="email" value="{{ $user->getEmail() }}" class="form-control"></br>
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

    <br><hr><br>
    
    <form action="{{ route('users.updatePassword') }}" method="post">
      {!! csrf_field() !!}
      <input type="hidden" name="id" id="id" value="{{ $user->getId() }}" id="id" />
      <label>Password</label></br>
      <input type="password" name="password" id="password" value="" class="form-control"></br>
      <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
@endsection