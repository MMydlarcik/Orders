@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>Dashboard</h1>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nejnovější objednávky</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($lastOrders as $order)
                    <a href='{{ route('orders.order', ['id' => $order->getId()]) }}'><li class="list-group-item">{{ $order->getCode() }}</li></a>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nejnovější uživatelé</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($lastUsers as $user)
                    <a href='{{ route('users.user', ['id' => $user->getId()]) }}'><li class="list-group-item">{{ $user->username }}</li></a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection