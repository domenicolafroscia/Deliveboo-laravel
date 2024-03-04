@extends('layouts.admin')

@section('content')
    {{-- <div class="container">
        @include('partials.go_back')
        <h2 class="py-3 text-center">{{ $meal->name }}</h2>
    </div>

    @if ($meal->image)
        <img src="{{str_contains($meal->image ,'https') ? $meal->image : asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" style="max-height: 250px">
    @else
        <h5 class="text-center">Image not found</h5>
    @endif

    <h5>Price: {{$meal->price . " €"}}</h5>

    @if ($meal->is_active)
        <h5 class="text-success">Meal available</h5>
    @else
        <h5 class="text-danger">Meal not available</h5>
    @endif

    <p>{{$meal->description}}</p> --}}
    <h2 class="text-center py-3">Preview for {{$meal->name}}</h2>
    <div class="row justify-content-center">

        <div class="col-10">
            <div class="dish-card">
                @if ($meal->image)
                    <img class="dish-image"
                        src="{{ str_contains($meal->image, 'https') ? $meal->image : asset('storage/' . $meal->image) }}"
                        alt="{{ $meal->name }}" style="height: 450px">
                @else
                    <h5 class="text-center">Image not found</h5>
                @endif
                <div class="dish-details text-center">
                    <h3 class="dish-title">{{ $meal->name }} <span class="not-available">{{$meal->is_active ? '' : '- Not Available'}}</span></h3>
                    <p class="dish-description">{{ $meal->description }}</p>
                    <p class="dish-price">{{ $meal->price . '€' }}</p>
                    <div class="actions">
                        {{-- <a class="btn btn-success" href="{{ route('admin.meals.show', ['meal' => $meal->slug]) }}">
                <i class="fa-solid fa-info"></i>
            </a> --}}
                        <a class="btn btn-green" href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>
                        <a class="btn btn-green" href="{{ route('admin.restaurants.index') }}">
                            <i class="fa-solid fa-check"></i> Save
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
