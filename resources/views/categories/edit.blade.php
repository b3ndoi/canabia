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
                    <form action="/admin/categories/{{$category->id}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        <div class='form-group'>
                            <label for='name'>Name</label>
                            <input type='text' class='form-control{{ $errors->has('name') ? ' is-invalid' : '' }}' id='name' name='name' value="{{old('name')?:$category->name}}" placeholder='Name'>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                       </div>
                        <div class='form-group'>
                            <label for='category_id'>Subcategory of:</label>
                            <select name="category_id"  class='form-control' id="category_id">
                                <option value="" >No subcategory</option>
                                @foreach($categories as $category_option)
                                    <option value="{{$category_option->id}}" {{$category_option->id==$category->category_id?'selected':''}}>{{$category_option->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection