@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.go_back')
        <h2 class="py-3 text-center">{{ $meal->name }}</h2>
    </div>

    @if ($meal->image)
        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">
    @else
        <h5 class="text-center">Image not found</h5>
    @endif

    <h5>Price: {{$meal->price}}</h5>

    @if ($meal->is_active)
        <h5 class="text-success">Meal available</h5>
    @else
        <h5 class="text-danger">Meal not available</h5>
    @endif

    <p>{{$meal->description}}</p>
@endsection
