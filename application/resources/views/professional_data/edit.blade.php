@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('professional_data.index') }}">Professional Data</a>
        </li>
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
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $professional_datum->name }}" type="text">
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
@section('js')
@endsection
