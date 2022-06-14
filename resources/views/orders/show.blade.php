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

            <hr>
            @if (Auth::user()->role == 'admin')
                <form method="POST" action="{{ route('orders.destroy') }}" accept-charset="UTF-8" style="display:inline">
                    {{ csrf_field() }}
                    <input type="hidden" name='id' value="{{ $order->getId() }}">
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Order"
                        onclick="return confirm('Confirm delete')"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        Delete</button>
                </form>
                <a href="{{ route('orders.edit', ['id' => $order->getId()]) }}" title="Edit Order">
                    <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Edit</button>
                </a>
            @endif

        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">Items</div>
        <div class="card-body">

            @foreach ($orderItems as $item)
                <form action="{{ route('orders.editItem') }}" method="post" class="row">
                    {!! csrf_field() !!}
                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->getId() }}" id="id" />
                    <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}" id="id" />
                    <div class="form-group col-7">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Code"
                            value="{{ $item->code }}"></br>
                    </div>
                    <div class="form-group col-3">
                        <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty"
                            value="{{ $item->qty }}"></br>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <div class="form-group col-1">
                            <input type="submit" name='action' value="Edit" class="btn btn-success"></br>
                        </div>
                        <div class="form-group col-1">
                            <input type="submit" name='action' value="Delete" class="btn btn-danger"
                                onclick="return confirm('Confirm delete')"></br>
                        </div>
                    @endif
                </form>
            @endforeach

            <hr>
            @if (Auth::user()->role == 'admin')
                <form action="{{ route('orders.storeItem') }}" method="post" class="row">
                    {!! csrf_field() !!}
                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->getId() }}" id="id" />
                    <div class="form-group col-7">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Code"></br>
                    </div>
                    <div class="form-group col-3">
                        <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty"></br>
                    </div>
                    <div class="form-group col-2">
                        <input type="submit" value="+" class="btn btn-success"></br>
                    </div>
                </form>
            @endif

        </div>
    </div>

    <hr>

    <div class="card">
        <div class="card-header">History</div>
        <div class="card-body">

            @foreach ($historyItems as $item)
                <form action="{{ route('orders.editHistoryItem') }}" method="post" class="row">
                    {!! csrf_field() !!}
                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->getId() }}" id="id" />
                    <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}" id="id" />
                    <div class="form-group col-1">
                        <input type="text" name="item_id2" id="item_id2" class="form-control" placeholder="Item ID"
                            value="{{ $item->id }}"></br>
                    </div>
                    <div class="form-group col-6">
                        <input type="text" name="history_action" id="history_action" class="form-control"
                            placeholder="Action" value="{{ $item->action }}"></br>
                    </div>
                    <div class="form-group col-3">
                        <select name="user_id" id="user_id" class="form-select form-select-md mb-3"
                            aria-label=".form-select-lg example">
                            @foreach ($users as $user)
                                <option {{ $item->user_id === $user->id ? 'selected' : '' }}
                                    value=" {{ $user->id }} ">{{ $user->username }} </option>
                            @endforeach
                        </select>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <div class="form-group col-1">
                            <input type="submit" name='action' value="Edit" class="btn btn-success"></br>
                        </div>
                        <div class="form-group col-1">
                            <input type="submit" name='action' value="Delete" class="btn btn-danger"
                                onclick="return confirm('Confirm delete')"></br>
                        </div>
                    @endif
                </form>
            @endforeach

            @if (Auth::user()->role == 'admin')
                <form action="{{ route('orders.storeHistory') }}" method="post" class="row">
                    {!! csrf_field() !!}
                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->getId() }}" id="id" />
                    <div class="form-group col-7">
                        <input type="text" name="action" id="action" class="form-control" placeholder="Action"></br>
                    </div>
                    <div class="form-group col-3">
                        <select name="user_id" id="user_id" class="form-select form-select-md mb-3"
                            aria-label=".form-select-lg example">
                            @foreach ($users as $user)
                                <option {{ auth()->user()->id == $user->id ? 'selected' : '' }}
                                    value=" {{ $user->id }} ">{{ $user->username }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-2">
                        <input type="submit" value="+" class="btn btn-success"></br>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
