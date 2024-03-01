@extends('layouts.admin')

@section('content')
    {{-- <a class="btn btn-warning my-3" style="color: white" href="{{ route('admin.orders.index') }}"><i
            class="fa-solid fa-arrow-rotate-left"></i> Go Back</a>
    <div class="container"> --}}
       
            <h2 class="text-center py-3">Your Orders</h2>
            @if (count($orders) > 0)
            {{-- Filter for date --}}
            <form action="{{route('admin.orders.index')}}" method="GET">
                <div class="row flex-column flex-md-row align-items-start">


                    <div class="col col-md-4 col-lg-2 mb-3">
                        <label for="filter-by-order" class="form-label">Filter by</label>
                        <select class="select-container" name="select_order" id="filter-by-order" class="form-select" aria-label="Default select example">
                            <option value="" selected>Choose one</option>
                            <option value="asc">Oldest order</option>
                            <option value="desc">Most recent order</option>
                        </select>
                    </div>

                    <div class="mb-3 col col-md-4 col-lg-3">
                        <label for="start-date" class="form-label">Start Date</label>
                        <input type="date" id="start-date" name="start_date">
                    </div>
                    <div class="mb-3 col col-md-4 col-lg-3">
                        <label for="end-date" class="form-label">End Date</label>
                        <input type="date" id="end-date" name="end_date">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Apply</button>
            </form>
            
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

                            <td>{{ $order->price_tot . '€' }}</td>

                            <td><span
                                    class="{{ $order->status ? 'btn btn-success' : 'btn btn-danger' }}">{{ $order->status ? 'Confirmed' : 'Deleted' }}</span>
                            </td>
                            <td>
                                {{ $order->created_at }}
                            </td>

                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.orders.show', $order) }}">Detail Order</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="alert alert-warning text-center mt-3">Your orders are empty!</h2>
            <a class="btn btn-warning" href="{{route('admin.orders.index')}}">Delete Filter</a>
        @endif
    </div>
@endsection
