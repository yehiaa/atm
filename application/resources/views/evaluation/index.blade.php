@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Evaluations</li>
    </ol>

    <!-- Page Content -->
    <h1>Evaluations </h1>
    <hr>


    select course to evaluate
    <div class="form-group">
        <div>
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);
                             " class="form-control" aria-describedby="selectHelpBlock">
                <option value="">select</option>
                @foreach($courses as $course)
                    <option value="{{ route('evaluations.create', [$course->id]) }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

@endsection

@section('js')
@endsection
