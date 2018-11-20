@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Newsletter LIST</div>

                <div class="card-body">
                    <a href="{{ route('newsletter.export') }}" class="btn btn-primary mb-3">Export Newsletter</a>

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($newsletters as $newsletter)
                                <tr>
                                    <td>{{$newsletter->full_name}}</td>
                                    <td>{{$newsletter->email}}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger">Remove</a>
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