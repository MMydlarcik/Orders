@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>{{ __('order.title') }}</h1>
            <div class="table-responsive">
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm" title="Add New Order">
                        <i class="fa fa-plus" aria-hidden="true"></i> {{ __('order.add') }}
                    </a>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('order.id') }}</th>
                            <th>{{ __('order.code') }}</th>
                            <th>{{ __('order.authorId') }}</th>
                            <th>{{ __('order.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->getId() }}</td>
                                <td>{{ $item->getCode() }}</td>
                                <td>{{ $item->getAuthorId() }}</td>
                                <td>
                                    <a href="{{ route('orders.order', ['id' => $item->getId()]) }}"
                                        title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            {{ __('order.view') }}</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endauth

    </div>
@endsection
