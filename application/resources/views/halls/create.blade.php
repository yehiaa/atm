@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('halls.index') }}">Halls</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Halls <a href="{{ route('halls.create') }}">Add new</a></h1>
    <hr>


@endsection

@section('js')
@endsection