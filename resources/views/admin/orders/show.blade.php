@extends('layouts.admin')

@section('content')
    <a class="btn btn-warning my-3" style="color: white" href="{{ route('admin.orders.index') }}"> Go Back</a>
    <div class="container">

        <h2 class="text-center py-3">Info Order</h2>
        {{-- <div class="d-flex align-items-center flex-column">
                    <div class="d-flex">
                        <h5>PRICE TOT:</h5>
                        <h5>{{ $order->price_tot }}</h5>
                    </div>

                    <div class="d-flex">
                        <h5>NAME:</h5>
                        <h5>{{ $order->customer_name }}</h5>
                    </div>

                    <div class="d-flex">
                        <h5>ADDRESS:</h5>
                        <h5>{{ $order->customer_address }}</h5>
                    </div>

                    <div class="d-flex">
                        <h5>PHONE:</h5>
                        <h5>{{ $order->customer_phone }}</h5>
                    </div>

                    <div class="d-flex">
                        <h5>STATUS:</h5>
                        <h5>{{ $order->status == 1 ? 'pagato' : 'non pagato' }}</h5>
                    </div>
                </div> --}}

        <div class="row row-cols-2">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h5>Customer</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: <strong>{{ $order->customer_name }}</strong></li>
                        <li class="list-group-item">Address: <strong>{{ $order->customer_address }}</strong></li>
                        <li class="list-group-item">Phone: <strong>{{ $order->customer_phone }}</strong></li>
                        <li class="list-group-item">email: <strong>{{ $order->customer_email }}</strong></li>
                        @if ($order->customer_note)
                        <li class="list-group-item">Note: {{ $order->customer_note }}</li>
                        @endif
                    </ul>
                </div>

            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Order</h5>
                    </div>
                    @foreach ($order->meals as $meal)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Meal: <strong>{{ $meal->name }}</strong></li>
                            <li class="list-group-item">Price: <strong>{{ $meal->price }}</strong></li>
                            <li class="list-group-item">Quantity: <strong>{{ $meal->pivot->quantity }}</strong></li>
                            <li class="list-group-item">Ingredients: <strong>{{ $meal->description }}</strong></li>
                        </ul>
                    @endforeach
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Tot: <strong>{{ $order->price_tot }}</strong></li>
                    </ul>
                </div>
            </div>



        </div>
    @endsection
