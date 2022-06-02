@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>Users list</h1>
    <p class="lead">Only authenticated users can access this section.</p>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>{{ $item->getUserName() }}</td>
                    <td>{{ $item->getEmail() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

</div>
@endsection