@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('specialities.index') }}">Specialities</a>
        </li>
        <li class="breadcrumb-item active">Edit Speciality{{ $speciality->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Hall</h1>
    <hr>
    @include('_partials.flash-messages')
    <form method="post" action="{{ route('specialities.update',[$speciality->id]) }}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $speciality->name }}" type="text">
        </div>

        <div class="form-group">
            <label>Is Active</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="is_active" class="form-check-input" value="1" @if($speciality->is_active == 1) checked @endif type="radio">
                        Active
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="is_active" class="form-check-input" value="0" @if($speciality->is_active == 0) checked @endif type="radio">
                        Inactive
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
@section('js')
@endsection
