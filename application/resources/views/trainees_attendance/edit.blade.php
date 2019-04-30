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
    <h1>Lecture ({{ $lecture->name }}) Trainees attendance</h1>
    <hr>
    @include('_partials.flash-messages')
    <hr>

    <form method="post" action="{{ route('lectures.trainees-attendance.update',[$lecture->id, $trainee_attendance->id]) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="trainee_id">Trainee</label>
            <div>
                <select id="trainee_id" name="trainee_id" class="form-control" aria-describedby="selectHelpBlock" >
                    @foreach($trainees as $trainee)
                        <option value="{{ $trainee->id }}">
                            {{ $trainee->name }}
                        </option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="lecture_id">Lecture</label>
            <div>
                <select id="lecture_id" name="lecture_id" class="form-control" aria-describedby="selectHelpBlock" >
                    <option value="{{ $lecture->id }}">
                        {{ $lecture->name }}
                    </option>
                </select>
                <span id="selectHelpBlock" class="form-text text-muted"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="start_datetime">Attended datetime</label>
            <input id="attended_at" name="attended_at" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ $trainee_attendance->attended_at->format('Y/m/d H:i') }}" required="required" type="text">
        </div>

        <div class="form-group">
            <button type="submit"  name="submit" class="btn btn-primary" >Update</button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection
