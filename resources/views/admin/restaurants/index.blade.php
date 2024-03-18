@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="card-restaurant">
            <h3 class="intro-restaurant">Welcome back {{Auth::user()->name}} {{Auth::user()->surname}}!</h3>
            @if ($restaurant->image)
                <img class="restaurant-image"
                    src="{{ str_contains($restaurant->image, 'https') ? $restaurant->image : asset('storage/' . $restaurant->image) }}""
                    alt="{{ $restaurant->image ? $restaurant->name : '' }}">
            @else
                <h3 class="text-center py-3">Image not found.</h3>
            @endif
            <h2 class="restaurant-name">{{ $restaurant->name }}</h2>
            <strong>Your data</strong>
            <ul class="restaurant-info">
                <li>{{ $restaurant->email }}</li>
                <li>{{ $restaurant->phone }}</li>
                <li class="mb-3">{{ $restaurant->address }}</li>
                <li><a class="btn btn-green"
                        href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">Modify data</a>
                </li>
            </ul>
        </div>

        <h2 class="text-center py-3">Menu</h2>

        @if (count($meals) > 0)
            <div class="row g-3 py-3">
                <div class="col-md-6 col-lg-4">
                    <div class="dish-card">
                        <div class="new-dish">
                            <a class="d-flex flex-column justify-content-center align-items-center py-5" href="{{ route('admin.meals.create') }}">
                                <h5>Add new Meal</h5>
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @foreach ($meals as $meal)
                    <div class="col-md-6 col-lg-4">
                        <div class="dish-card">
                            @if ($meal->image)
                                <img class="dish-image"
                                    src="{{ str_contains($meal->image, 'https') ? $meal->image : asset('storage/' . $meal->image) }}"
                                    alt="{{ $meal->image ? $meal->name : '' }}">
                            @else
                                <h3 class="text-center py-3">Image not found</h3>
                            @endif
                            <div class="dish-details">
                                <h3 class="dish-title">{{ $meal->name }} <span class="not-available">{{$meal->is_active ? '' : '- Not Available'}}</span></h3>
                                <p class="dish-description">{{ $meal->description }}</p>
                                <p class="dish-price">{{ $meal->price . '€' }}</p>

                                <div class="actions">
                                    <a class="btn btn-green"
                                        href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>
                                    <form class="d-inline-block"
                                        action="{{ route('admin.meals.destroy', ['meal' => $meal->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger move-delete" type="submit"
                                            data-title="{{ $meal->name }}"><i class="fa-solid fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="alert alert-warning mt-3 text-center">Click the button to start the creation of your personal meals!
            </h2>
            <div class="text-end">
                <a class="btn btn-violet" href="{{ route('admin.meals.create') }}">Create new meal</a>
            </div>
        @endif

        @include('partials.move_modal')
    </div>
@endsection
