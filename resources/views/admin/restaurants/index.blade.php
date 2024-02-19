@extends('layouts.admin')

@section('content')
@include('partials.go_back')
<div class="container">

    <h2 class="text-center py-3">{{$restaurant->name}}</h2>

    <h2 class="text-center py-3">Your Meals {{$restaurant->name}}</h2>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.meals.create')}}">Create new meal</a>
        </div>

        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($meals as $meal)
                    <tr>
                        <th scope="row">{{ $meal->name }}</th>
                        <td>{{ $meal->price }}</td>
                        <td>{{ $meal->is_active }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection