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
                <span id="selectHelpBlock" class="form-text text-muted">Only registered trainees</span>
            </div>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <hr>


    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Attended Trainees ({{ $traineesAttendance->count() }})</h4>
                    <table  class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Identity</th>
                            <th>Identity type</th>
                            <th>Country</th>
                            <th>City</th>
                            {{--<th>Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($traineesAttendance as $traineeAttendance)
                            <tr>
                                <td>{{ $traineeAttendance->trainee->name }}</td>
                                <td>{{ $traineeAttendance->trainee->email }}</td>
                                <td>{{ $traineeAttendance->trainee->phone }}</td>
                                <td>{{ $traineeAttendance->trainee->identity }}</td>
                                <td>{{ $traineeAttendance->trainee->identity_type }}</td>
                                <td>{{ $traineeAttendance->trainee->country }}</td>
                                <td>{{ $traineeAttendance->trainee->city }}</td>
                                {{--<td>--}}
                                    {{--<button class="btn btn-danger">Remove</button>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $('.datetime').datetimepicker();
    </script>
@endsection