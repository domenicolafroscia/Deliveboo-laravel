@extends('layouts.admin')

@section('content')

@include('partials.go_back')

<h2 class="text-center py-3">Modify your Restautant details</h2>

<form class="mb-3" action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 has-validation">
        <label for="name" class="form-label">Name Restaurant</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $restaurant->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 has-validation">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email', $restaurant->email) }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 has-validation">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
            value="{{ old('phone', $restaurant->phone) }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 has-validation">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
            value="{{ old('address', $restaurant->address) }}">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 has-validation">
        <label for="p_iva" class="form-label">P.Iva</label>
        <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" name="p_iva"
            value="{{ old('p_iva', $restaurant->p_iva) }}">
        @error('p_iva')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <img id="preview-img" src="" alt="" style="max-height: 250px">
    </div>

    <div class="mb-3">
        <p>Choose your Category:</p>
        @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="{{ $category->name }}"
                        name="categories[]" @checked(in_array($category->id, old('categories', [])))>
                    <label class="form-check-label" for="{{ $category->name }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
            @error('categories')
                <div class="text-danger">{{ $message }}</div>
            @enderror
    </div>
    <button class="btn btn-success" type="submit">Edit</button>
</form>
@endsection