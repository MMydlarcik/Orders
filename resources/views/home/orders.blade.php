@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>Order list</h1>
    <p class="lead">Only authenticated users can access this section.</p>
    <div class="table-responsive">
        <a href="{{ url('/create') }}" class="btn btn-success btn-sm" title="Add New Order">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Author ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>{{ $item->getCode() }}</td>
                    <td>{{ $item->getAuthorId() }}</td>
                    <td>
                        <a href="{{ route('orders.order', ['id'=>$item->getId()]) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

</div>
@endsection