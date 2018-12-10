@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order: {{$order->last_name}} {{$order->first_name}} <{{$order->email}}></div>

                <div class="card-body">

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Full name:</b> {{$order->last_name}} {{$order->first_name}} <br>
                            <b>Email:</b> {{$order->email}}<br>
                            <b>Phone:</b> {{$order->phone}}<br>
                        
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Products</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>
                                    {{$product->product_name}}({{$product->product_amount}}{{$product->unit}})
                                    </td>
                                    <td>
                                        ${{$product->product_price}}
                                    </td>
                                    <td>{{$product->product_count}}</td>
                                    <td>
                                        ${{$product->product_price*$product->product_count}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                Total:
                                </td>
                                <td>
                                    
                                </td>
                                <td></td>
                                <td>
                                    ${{$total}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection