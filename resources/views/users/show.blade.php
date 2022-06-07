@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">User Detail</div>
  <div class="card-body">

    <div class="card-body">
      <h5 class="card-title">ID : {{ $user->getId() }}</h5>
      <p class="card-text">Username : {{ $user->getUserName() }}</p>
      <p class="card-text">Email : {{ $user->getEmail() }}</p>
    </div>

    <hr>
    <form method="POST" action="{{ route('users.destroy') }}" accept-charset="UTF-8" style="display:inline">
      {{ csrf_field() }}
      <input type="hidden" name='id' value="{{ $user->getId() }}">
      <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm('Confirm delete')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <a href="{{ route('users.edit', ['id'=>$user->getId()]) }}" title="Edit User">
      <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
    </a>

  </div>
</div>
@endsection