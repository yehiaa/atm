@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('specialties.index') }}">Specialities</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Speciality</h1>
    <hr>
    @include('_partials.flash-messages')

    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" class="form-control here" required="required" type="text">
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection

@section('js')
@endsection