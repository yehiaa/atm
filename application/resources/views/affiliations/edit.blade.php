@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('affiliations.index') }}">Affiliation</a>
        </li>
        <li class="breadcrumb-item active">Edit Affiliation{{ $affiliation->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Affiliation</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('affiliations.update', [$affiliation->id]) }}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $affiliation->name }}" type="text">
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
@section('js')
@endsection

