@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">Edit order</div>
  <div class="card-body">
      
      <form action="{{ route('orders.update') }}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="{{ $order->getId() }}" id="id" />
        <label>Code</label></br>
        <input type="text" name="code" id="code" value="{{ $order->getCode() }}" class="form-control"></br>
        <label>Author ID</label></br>
        <input type="text" name="author_id" id="author_id" value="{{ $order->getAuthorId() }}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection