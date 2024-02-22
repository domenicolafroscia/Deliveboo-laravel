@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-warning my-3" style="color: white" href="{{route('admin.orders.index')}}"><-go back to your orders</a>
        <h2 class="text-center py-3">Info Order</h2>
        <div class="d-flex align-items-center flex-column">
            <div class="d-flex">
                <h5>PRICE TOT:</h5>
                <h5>{{$order->price_tot}}</h5>
            </div>

            <div class="d-flex">
                <h5>NAME:</h5>
                <h5>{{$order->customer_name}}</h5>
            </div>

            <div class="d-flex">
                <h5>ADDRESS:</h5>
                <h5>{{$order->customer_address}}</h5>
            </div>

            <div class="d-flex">
                <h5>PHONE:</h5>
                <h5>{{$order->customer_phone}}</h5>
            </div>

            <div class="d-flex">
                <h5>STATUS:</h5>
                <h5>{{$order->status == 1 ? 'pagato' : 'non pagato'}}</h5>
            </div>
    </div>    
       

        
    </div>
@endsection
