@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center row">

                <div class=" col-md-6">
                    <img src="{{ asset('storage/not-found-img.png') }} " alt=""
                        class="img-fluid">
                </div>
                
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                    <p class="lead">
                        The page you're looking for doesn't exist.
                    </p>
                    <a class="btn btn-primary" href="{{ route('admin.restaurants.index') }}">Go Home</a>
                </div>
    
            </div>
        </div>

    </div>
@endsection
