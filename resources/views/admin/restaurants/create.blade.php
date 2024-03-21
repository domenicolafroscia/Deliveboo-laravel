@extends('layouts.admin')

@section('content')
    <h2 class="text-center py-3">Insert your Restautant details</h2>

    <form class="mb-3" action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 has-validation">
            <label for="name" class="form-label">Name Restaurant</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" required minlength="3" maxlength="120">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 has-validation">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 has-validation">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                value="{{ old('phone') }}" required minlength="10" maxlength="15">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 has-validation">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 has-validation">
            <label for="p_iva" class="form-label">P.Iva</label>
            <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" name="p_iva"
                value="{{ old('p_iva') }}" required minlength="11" maxlength="11">
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

        <div class="mb-3 container-md">
            <h4 class="text-center pb-3">Choose your Category</h4>
            <div class="row ">
                @foreach ($categories as $category)
                <div class="col-6 col-sm-4 col-md-3 d-flex justify-content-center">
                    <div class="form-check p-0">
                        <input class="form-check-input hidden" type="checkbox" value="{{ $category->id }}"
                            id="{{ $category->name }}" name="categories[]" @checked(old('categories', []))>
                        <label class="form-check-label" for="{{ $category->name }}">
                            {{ $category->name }}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @error('categories')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-violet" type="submit">Create</button>
    </form>
@endsection
