@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category Create</div>
                
                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class='form-group'>
                            <label for='name'>Name</label>
                            <input type='text' class='form-control{{ $errors->has('name') ? ' is-invalid' : '' }}' id='name' name='name' placeholder='Name'>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class='form-group'>
                            <label for='unit'>Unit</label>
                            <select name="unit"  class='form-control' id="unit">
                                <option value="g">g</option>
                                <option value="g">ml</option>
                            </select>
                        </div>
                        <price-component prices=""></price-component>
                        <!-- <span class="text-danger" >
                            <strong>{{ $errors->first('amount[]') }}</strong>
                        </span>
                        <span class="text-danger" >
                            <strong>{{ $errors->first('price[]') }}</strong>
                        </span> -->
                        <div class='form-group'>
                            <label for='category_id'>Category</label>
                            <select name="category_id"  class='form-control' id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" rows="3"></textarea>
                          @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class='form-group'>
                            <label for='image'>Photo</label>
                            <input type='file' class='form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}' id='image' name='image'>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-success" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection