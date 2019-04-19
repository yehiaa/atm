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
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Professional Data</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('professional_data.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" value="{{old('name')}}" class="form-control here" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Name</span>
        </div>
        <div class="form-group">
            @can('professionalData add')
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
            @endcan
        </div>
    </form>


@endsection

@section('js')
@endsection
