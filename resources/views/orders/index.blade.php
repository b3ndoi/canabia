@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Products</th> 
                                 
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                <a href="/admin/orders/{{$order->id}}">{{$order->last_name}} {{$order->first_name}}</a>
                                </td>
                                <td>
                                    {{$order->email}}
                                </td>
                                <td>
                                    {{$order->phone}}
                                </td>
                                <td>{{$order->products()->count()}}</td>
                                <td><span class="{{$order->delivered=='1'?'badge badge-success':'badge badge-danger'}}">{{$order->delivered=='1'?'Deliverd':'Still not delivered'}}</span></td>
                                <td>
                                    <a href="#" class="btn btn-success">Delivered</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection