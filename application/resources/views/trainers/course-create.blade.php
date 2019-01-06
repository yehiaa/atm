@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('courses.show', ['course_id' => $course->id]) }}">{{ $course->name }}</a>
        </li>
        <li class="breadcrumb-item active">Assign trainer to course</li>
    </ol>

    <!-- Page Content -->
    <h1>Add trainer to ({{ $course->name }})</h1>
    <hr>
    @include('_partials.flash-messages')


    <form method="post" action="{{ route('courses.trainers.store', ['course_id' => $course->id]) }}">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="form-group">
            <label for="trainer_id">Trainer</label>
            <div>
                <select id="trainer_id" name="trainer_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Assign trainer to the course</span>
            </div>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection