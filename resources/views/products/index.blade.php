@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                <a href="{{ route('product.create') }}" class="btn btn-success mb-3">Create New Product</a>

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Amount/Price ($)</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{$product->image}}" alt="" width="150px" class="img-fluid">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        @foreach($product->prices as $price)
                                        {{$price->amount}}{{$product->unit}}/{{$price->price}}<br>
                                        @endforeach
                                    </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <a href="products/{{$product->slug}}/edit" class="btn btn-primary">Edit</a>
                                        <a href="products/{{$product->id}}/delete" onClick="if (! confirm('Are you sure you want to delete this product?')) { return false; }" class="btn btn-danger">Delete</a>

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