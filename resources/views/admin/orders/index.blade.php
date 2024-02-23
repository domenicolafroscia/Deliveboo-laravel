@extends('layouts.admin')

@section('content')
<a class="btn btn-warning my-3" style="color: white" href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-arrow-rotate-left"></i> Go Back</a>
    <div class="container">
        @if (count($orders)>0)
        <h2 class="text-center py-3">Your Orders</h2>

        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">Price Tot</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                        <tr>

                            <td>{{ $order->price_tot . "€" }}</td>

                            <td><span class="{{$order->status ? 'btn btn-success' : 'btn btn-danger'}}">{{ $order->status ? 'Confirmed' : 'Deleted'}}</span></td>
                            <td>
                                {{$order->created_at}}
                            </td>

                            <td>
                                <a class="btn btn-warning" href="{{route('admin.orders.show', $order)}}">Detail Order</a> 
                            </td>
                            
                        </tr>
                    @endforeach
            </tbody>
        </table>
            
        @else
            <h2 class="alert alert-warning text-center mt-3">Your orders are empty!</h2>
        @endif
    </div>
@endsection
