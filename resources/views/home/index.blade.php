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
                    <li class="list-group-item">{{ $order->getCode() }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">XX</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
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