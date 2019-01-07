@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('courses.show', ['course_id' => $lecture->course_id]) }}">{{ $lecture->name }}</a>
        </li>
        <li class="breadcrumb-item active">Trainees attendance</li>
    </ol>

    <!-- Page Content -->
    <h1>Lecture ({{ $lecture->name }})</h1>
    <hr>
    @include('_partials.flash-messages')


    <form method="post" action="{{ route('lectures.trainees-attendance.store', [$lecture->id]) }}">
        @csrf
        <input type="hidden" name="lecture_id" value="{{ $lecture->id }}">

        <div class="form-group">
            <label for="trainee_id">Trainee</label>
            <div>
                <select id="trainee_id" name="trainee_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($trainees as $trainee)
                        <option value="{{ $trainee->id }}">{{ $trainee->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Trainee</span>
            </div>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <hr>

    {{ dump($traineesAttendance) }}


@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection