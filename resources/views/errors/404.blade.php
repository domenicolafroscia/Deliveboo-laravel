@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="justify-content-center row box-not-found">

                
                <div class="not-found col-md-6 d-none d-lg-block"></div>
                {{-- <div class=" col-md-6 d-lg-none">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNRbF2c1k9SnwBoDcwhVREGcK9xWuSUCamRQ&usqp=CAU" alt=""
                        class="img-fluid" style="height: 250px">
                </div> --}}
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                    <p class="lead">
                        The page you're looking for doesn't exist.
                    </p>
                    <a class="btn btn-primary mb-3" href="{{ route('admin.restaurants.index') }}">Go Home</a>
                </div>
    
            </div>
        </div>

    </div>
@endsection
