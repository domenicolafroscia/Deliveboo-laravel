@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.go_back')
        <h2 class="text-center py-3">Edit Meal</h2>

        <form class="mt-5" action="{{ route('admin.meals.update', ['meal' => $meal->slug]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf

          {{--   @if (session()->has('message'))
            <div class="alert alert-warning">{{ session('message') }}</div>
        @endif --}}

            <div class="mb-3 has-validation">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $meal->name) }}" required minlength="2" maxlength="120">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="price" class="form-label">Price &euro;</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $meal->price) }}" required min="0.01" max="999.99">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Ingredients</label>
                <textarea class="form-control" id="description" rows="3" name="description" required maxlength="2000">{{ old('description', $meal->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{ old('image', $meal->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="image-preview mb-3">
                @if ($meal->image)
                    <img id="image-preview" src="{{ asset('storage/' . $meal->image) }}" alt="" style="max-height: 250px">
                @endif
            </div>

            <div class="mb-3">
                <img id="preview-img" src="" alt="" style="max-height: 250px">
            </div>

            <div class="mb-3">
                <label class="form-label" for="is_active">Available</label>
                <select class="form-select" name="is_active" class="@error('is_active') is-invalid @enderror"
                    id="is_active">
                    <option value="1" @selected(!old('is_active', $meal->is_active))>Meal is Available</option>
                    <option value="0" @selected(!old('is_active', $meal->is_active))>Meal is not Available</option>
                </select>
                @error('is_visible')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-violet my-4" type="submit" >Save</button>

        </form>
    </div>
@endsection
