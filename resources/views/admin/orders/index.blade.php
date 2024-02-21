@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center py-3">Your Orders</h2>

        <table class="table table-striped my-5">
            <thead>
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col">Price Tot</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Meal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>

                            <td>{{ $order->price_tot . "€" }}</td>

                            <td>{{ $order->status }}</td>
                            <td>
                                
                            </td>

                            <td class="text-center">
                                <a class="btn btn-success" href="{{route('admin.orders.show', $order)}}">Detail Order</a> 
                            </td>
                            
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
