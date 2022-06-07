@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>{{__('user.title')}}</h1>
    <div class="table-responsive">
        <a href="{{ route ('users.create') }}" class="btn btn-success btn-sm" title="Add New User">
            <i class="fa fa-plus" aria-hidden="true"></i> {{__('user.add')}}
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>{{__('user.id')}}</th>
                    <th>{{__('user.username')}}</th>
                    <th>{{__('user.email')}}</th>
                    <th>{{__('user.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>{{ $item->getUserName() }}</td>
                    <td>{{ $item->getEmail() }}</td>
                    <td>
                        <a href="{{ route('users.user', ['id'=>$item->getId()]) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>{{__('user.view')}}</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

</div>
@endsection