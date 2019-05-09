@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        @can('professionalData list')
        <li class="breadcrumb-item">
            <a href="{{ route('professional_data.index') }}">Professional Data</a>
        </li>
        @endcan
        <li class="breadcrumb-item active">Edit Professional Data{{ $professional_datum->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Professional Data</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('professional_data.update', [$professional_datum->id]) }}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $professional_datum->name }}" type="text" required = required>
        </div>
        <div class="form-group">
            @can('professionalData edit')
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            @endcan
        </div>
    </form>

@endsection
@section('js')
@endsection
