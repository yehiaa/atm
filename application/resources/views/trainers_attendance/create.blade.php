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
        <li class="breadcrumb-item active">Trainers attendance</li>
    </ol>

    <!-- Page Content -->
    <h1>Lecture ({{ $lecture->name }}) Trainers attendance</h1>
    <hr>
    @include('_partials.flash-messages')


    <form method="post" action="{{ route('lectures.trainers-attendance.store', [$lecture->id]) }}">
        @csrf
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
                <span id="selectHelpBlock" class="form-text text-muted">Only assigned trainers</span>
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
                    <h4 class="card-title">Attended Trainers ({{ $trainersAttendance->count() }})</h4>
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
                            <th>Attendance</th>
                            {{--<th>Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trainersAttendance as $trainerAttendance)
                            <tr>
                                <td>{{ $trainerAttendance->trainer->name }}</td>
                                <td>{{ $trainerAttendance->trainer->email }}</td>
                                <td>{{ $trainerAttendance->trainer->phone }}</td>
                                <td>{{ $trainerAttendance->trainer->identity }}</td>
                                <td>{{ $trainerAttendance->trainer->identity_type }}</td>
                                <td>{{ $trainerAttendance->trainer->country }}</td>
                                <td>{{ $trainerAttendance->trainer->city }}</td>
                                <td>{{ $trainerAttendance->attended_at }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('lectures.trainers-attendance.edit',[$trainerAttendance->lecture_id, $trainerAttendance->id]) }}" role="button">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('lectures.trainers-attendance.destroy',[$trainerAttendance->lecture_id , $trainerAttendance->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                            Remove
                                        </button>
                                    </form>
                                </td>
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
@endsection
