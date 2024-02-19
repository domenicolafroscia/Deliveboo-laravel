@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center py-3">Your Meals</h2>

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
                        <td>{{ $project->price }} $</td>
                        <td>{{ $project->is_active }}</td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection