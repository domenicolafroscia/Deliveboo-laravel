@extends('layouts.admin')

@section('content')

    <div class="container">

        @if (count($meals) > 0)
            <h2 class="py-3 text-center">All the meal you want to delete</h2>
            <div class="row">
                @foreach ($meals as $meal)
                    <div class="col-md-4">
                        <div class="dish-card">
                            @if ($meal->image)
                            <img class="dish-image" src="{{ str_contains($meal->image, 'https') ? $meal->image : asset('storage/' . $meal->image) }}" alt="{{$meal->image ? $meal->name : ''}}">
                            @else
                                <h3 class="text-center py-3">Image not found</h3>
                            @endif
                            <div class="dish-details">
                                <h3 class="dish-title">{{ $meal->name }}</h3>
                                <p class="dish-description">{{ $meal->description }}</p>
                                <p class="dish-price">{{ $meal->price . '€' }}</p>
                                <div class="actions">
                                    <form class="d-inline-block"
                                        action="{{ route('admin.trash.restore', ['id' => $meal->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-green" type="submit">Restore</button>
                                    </form>

                                    <form class="d-inline-block"
                                        action="{{ route('admin.trash.delete', ['id' => $meal->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-delete" type="submit"
                                            data-title="{{ $meal->name }}">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <table class="table table-striped my-5">
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
                            <td>{{ $meal->price . ' €' }} </td>
                            <td>{{ $meal->is_active ? 'Available' : 'Not available' }}</td>
                            <td>
                                <form class="d-inline-block" action="{{ route('admin.trash.restore', ['id' => $meal->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success" type="submit">Restore</button>
                                </form>

                                <form class="d-inline-block" action="{{ route('admin.trash.delete', ['id' => $meal->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $meal->name }}">Delete</button>
                                </form> --}}
            {{-- <a class="btn btn-success" href="{{ route('admin.trash.restore', ['id' => $meal->id]) }}">
                                Restore
                            </a> --}}
            {{-- <a class="btn btn-danger" href="{{ route('admin.meals.edit', ['meal' => $meal->slug]) }}">
                                Delete
                            </a> --}}

            {{-- </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        @else
            <h2 class="alert alert-warning mt-3 text-center">The Trash is empty!</h2>
        @endif

        @include('partials.delete_modal')
    </div>

@endsection
