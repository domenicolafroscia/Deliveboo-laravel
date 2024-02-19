@extends('layouts.admin')

@section('content')
@include('partials.go_back')
    <h2 class="text-center py-3">{{$restaurant->name}}</h2>
@endsection