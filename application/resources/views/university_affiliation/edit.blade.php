@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        @can('universityAffiliation list')
        <li class="breadcrumb-item">
            <a href="{{ route('university_affiliations.index') }}">University Affiliation</a>
        </li>
        @endcan
        <li class="breadcrumb-item active">Edit University Affiliation{{ $universityAffiliation->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Hall</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('university_affiliations.update', [$universityAffiliation->id]) }}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $universityAffiliation->name }}" type="text">
        </div>
        <div class="form-group">
            @can('universityAffiliation edit')
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
            @endcan
        </div>
    </form>

@endsection
@section('js')
@endsection
