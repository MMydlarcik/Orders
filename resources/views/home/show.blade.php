@extends('layouts.app-master')
@section('content')
<div class="card">
  <div class="card-header">Order Detail</div>
  <div class="card-body">

    <div class="card-body">
      <h5 class="card-title">Order : {{ $order->getId() }}</h5>
      <p class="card-text">Code : {{ $order->getCode() }}</p>
      <p class="card-text">Author Id : {{ $order->getAuthorId() }}</p>
    </div>

    </hr>
    <form method="POST" action="{{ route('orders.destroy') }}" accept-charset="UTF-8" style="display:inline">
      {{ csrf_field() }}
      <input type="hidden" name='id' value="{{ $order->getId() }}">
      <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm('Confirm delete')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <a href="{{ route('orders.edit', ['id'=>$order->getId()]) }}" title="Edit Order">
      <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
    </a>

  </div>
</div>
@endsection