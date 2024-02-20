@extends('layouts.admin')

@section('content')
    @include('partials.go_back')
    <div class="container">

        <h2 class="text-center py-3">{{ $restaurant->name }}</h2>

        <h2 class="text-center py-3">Your Meals {{ $restaurant->name }}</h2>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.meals.create') }}">Create new meal</a>
        </div>
        @if (count($meals) > 0)
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
                            <td>{{ $meal->price . "€" }}</td>
                            <td>{{ $meal->is_active ? 'Available' : 'Not available' }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.meals.show', ['meal' => $meal->slug]) }}">
                                    <i class="fa-solid fa-info"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.meals.destroy',['meal' => $meal->slug])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="alert alert-warning mt-3 text-center">Click the button to start the creation of your personal meals!
            </h2>
        @endif

    </div>
@endsection
