@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        @can('lecture add')
        <li class="breadcrumb-item">
            <a href="{{ route('courses.show', ['course_id' => $course->id]) }}">{{ $course->name }}</a>
        </li>
        <li class="breadcrumb-item active">Create new lecture</li>
        @endcan
    </ol>

    <!-- Page Content -->
    <h1>Lecture ({{ $course->name }})</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('courses.lectures.store', ['course_id' => $course->id]) }}">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" autocomplete="off" placeholder="Name" class="form-control" value="{{ old('name') }}" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Lecture name</span>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" cols="40" rows="2" class="form-control"  aria-describedby="notesHelpBlock">{{ old('notes') }}</textarea>
            <span id="notesHelpBlock" class="form-text text-muted">notes</span>
        </div>

        <div class="form-group">
            <label for="start_datetime">Start datetime</label>
            <input id="start_datetime" name="start_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ old('start_datetime') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">start date</span>
        </div>

        <div class="form-group">
            <label for="end_datetime">End datetime</label>
            <input id="end_datetime" name="end_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ old('end_datetime') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">end date</span>
        </div>

        <div class="form-group">
            <label for="hall_id">Hall</label>
            <div>
                <select id="hall_id" name="hall_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Hall / Auditorium</span>
            </div>
        </div>
        @can('lecture add')
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
        @endcan
    </form>

@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection
