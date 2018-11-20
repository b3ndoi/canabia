@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Create</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="/products/{{$product->slug}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        <div class='form-group'>
                            <label for='name'>Name</label>
                            <input type='text' class='form-control' value="{{old('name')?:$product->name}}" id='name' name='name' placeholder='Name'>
                        </div>
                        <div class='form-group'>
                            <label for='price'>Price</label>
                            <input type='text' class='form-control' id='price' value="{{old('price')?:$product->price}}" name='price' placeholder='Price'>
                        </div>
                        <div class='form-group'>
                            <label for='category_id'>Category</label>
                            <select name="category_id"  class='form-control' id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category_id == $category->id?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" name="description" id="description" rows="3">{{old('description')?:$product->description}}</textarea>
                        </div>
                        <div class='form-group'>
                            <label for='image'>Photo</label>
                            <input type='file' class='form-control-file' id='image' name='image'>
                        </div>
                        <button class="btn btn-success" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection