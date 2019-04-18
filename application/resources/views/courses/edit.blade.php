@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            @can('course list')
            <a href="{{ route('courses.index') }}">Course</a>
            @endcan
        </li>
        <li class="breadcrumb-item active">Edit Course{{ $course->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Course</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('courses.update', [$course->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" autocomplete="off" placeholder="Name" class="form-control" value="{{ $course->name }}" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Course name</span>
        </div>

        <div class="form-group">
            <label for="alternative_name">Alternative name</label>
            <input id="alternative_name" name="alternative_name" autocomplete="off" placeholder="alternative name" value="{{ $course->alternative_name }}" class="form-control" aria-describedby="nameHelpBlock" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Alternative name</span>
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input id="logo" name="logo"  class="form-control-file" aria-describedby="nameHelpBlock" type="file">
            <img src="{{ asset("storage/$course->logo") }}"alt="course logo" class="img-thumbnail" style="max-width:30px">
            <span id="nameHelpBlock" class="form-text text-muted">Logo. jpeg, png, bmp, gif, or svg</span>
        </div>

        <div class="form-group">
            <label for="percentage_to_pass">Percentage to pass</label>
            <input id="percentage_to_pass" name="percentage_to_pass" autocomplete="off" placeholder="percentage_to_pass" value="{{ $course->percentage_to_pass }}" class="form-control" aria-describedby="nameHelpBlock" required="required" type="number">
            <span id="nameHelpBlock" class="form-text text-muted">Attendance percentage to pass from 1 to 100 %</span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" cols="40" rows="2" class="form-control"  aria-describedby="descriptionHelpBlock">{{ $course->description }}</textarea>
            <span id="descriptionHelpBlock" class="form-text text-muted">description</span>
        </div>

        <div class="form-group">
            <label for="start_datetime">Start datetime</label>
            <input id="start_datetime" name="start_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ $course->start_datetime->format('Y/m/d H:i') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">start date</span>
        </div>

        <div class="form-group">
            <label for="end_datetime">End datetime</label>
            <input id="end_datetime" name="end_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ $course->end_datetime->format('Y/m/d H:i') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">end date</span>
        </div>

        <div class="form-group">
            @can('course edit')
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
            @endcan
        </div>
    </form>

@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection
