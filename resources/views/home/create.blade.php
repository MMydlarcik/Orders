@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">New Order</div>
  <div class="card-body">
      
      <form action="{{ route ('home.store') }}" method="post">
        {!! csrf_field() !!}
        <label>Code</label></br>
        <input type="text" name="code" id="code" class="form-control"></br>
        <label>Author Id</label></br>
        <input type="text" name="author_id" id="author_id" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection