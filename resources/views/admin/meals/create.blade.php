@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.go_back')
        <div class="row row-cols-2 justify-content-center">
            <div class="col">
                <h2 class="text-center py-3">New Meal</h2>

                <form class="mt-5 form-prevent-multiple-click" action="{{ route('admin.meals.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                   {{--  @if (session()->has('message'))
                        <div class="alert alert-warning">{{ session('message') }}</div>
                    @endif --}}

                    <div class="mb-3 has-validation">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required minlength="2" maxlength="120">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3 has-validation">
                        <label for="price" class="form-label">Price &euro;</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" value="{{ old('price') }}" required min="0.01" max="999.99">

                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Ingredients</label>
                        <textarea class="form-control" id="description" rows="3" name="description" required maxlength="2000">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <img id="preview-img" src="" alt="" style="max-height: 250px">
                    </div>

                    <button id="submit" class="btn btn-violet my-3" type="submit">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/prevent-double-click-form.js'])
@endsection
