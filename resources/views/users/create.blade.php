@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">New User</div>
  <div class="card-body">

    <form action="{{ route ('users.store') }}" method="post">
      {!! csrf_field() !!}
      <label>Username</label></br>
      <input type="text" name="username" id="username" class="form-control"></br>
      <label>E-mail</label></br>
      <input type="email" name="email" id="email" class="form-control"></br>
      <label>Password`</label></br>
      <input type="password" name="password" id="password" class="form-control"></br>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@endsection