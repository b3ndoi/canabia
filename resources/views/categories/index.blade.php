@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category Create</div>

                <div class="card-body">
                <a href="{{ route('category.create') }}" class="btn btn-success">Create New Category</a>

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Has SubCategories</th>
                                <th>Product Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->category_id}}</td>
                                    <td>{{$category->products()->count()}}</td>
                                    <td>
                                        <a href="categories/{{$category->id}}/edit" class="btn btn-primary">Edit</a>
                                        <a href="categories/{{$category->id}}/delete" onClick="if (! confirm('Are you sure you want to delete this category?\nYou will delete all category products as well')) { return false; }" class="btn btn-danger">Delete</a>
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