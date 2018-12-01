@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order: {{$order->last_name}} {{$order->first_name}}</div>

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
                                <th>Products</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>
                                    {{$product->product_name}}({{$product->product_amount}})
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