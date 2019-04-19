@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        @can('speciality list')
        <li class="breadcrumb-item">
            <a href="{{ route('specialities.index') }}">Specialities</a>
        </li>
        @endcan
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Speciality</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('specialities.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" value="{{old('name')}}" class="form-control here" required="required" type="text">
        </div>
        @can('speciality add')
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
        @endcan
    </form>


@endsection

@section('js')
@endsection
