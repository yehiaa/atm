@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
        <li class="breadcrumb-item active">{{ $course->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>{{ $course->name }}</h1>
    <hr>
    @include('_partials.flash-messages')

    {{--<p> the training halls</p>--}}
    <div class="row">
        <div class="col-md-12">

            <dl class="row">
                <dt class="col-sm-3">Alternative name</dt>
                <dd class="col-sm-9">{{ $course->alternative_name }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">
                    <p>{{ $course->description }}</p>
                </dd>

                <dt class="col-sm-3">Start datetime</dt>
                <dd class="col-sm-9">{{ $course->start_datetime->format('Y-m-d') }}</dd>

                <dt class="col-sm-3">End datetime</dt>
                <dd class="col-sm-9">{{ $course->end_datetime->format('Y-m-d') }}</dd>
            </dl>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Lectures</h4>
                    <table  class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hall</th>
                            <th>Start datetime</th>
                            <th>End datetime</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($course->lectures as $lecture)
                            <tr>
                                <td>{{ $lecture->name }}</td>
                                <td>{{ $lecture->hall->name }}</td>
                                <td>{{ $lecture->start_datetime }}</td>
                                <td>{{ $lecture->end_datetime }}</td>
                                <td>{{ str_limit($lecture->notes, 30) }}</td>
                                <td>
                                    <a class="btn btn-primary" href="#" role="button">Edit</a>
                                    <a class="btn btn-dark" href="#" role="button">Checkin trainees</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Hall</th>
                            <th>Start datetime</th>
                            <th>End datetime</th>
                            <th>Notes</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>

                    <a href="{{ route('courses.lectures.create', ['course_id'=>$course->id]) }}" class="card-link">Add lecture</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Trainers</h4>
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course->trainers as $trainer)
                            <tr>
                                <td>{{ $trainer->name }}</td>
                                <td>{{ $trainer->email }}</td>
                                <td>{{ $trainer->phone }}</td>
                                <td>{{ $trainer->identity }}</td>
                                <td>{{ $trainer->identity_type }}</td>
                                <td>{{ $trainer->country }}</td>
                                <td>{{ $trainer->city }}</td>
                                <td>
                                    <a class="btn btn-primary" href="#" role="button">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    <a href="#" class="card-link">Add new</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        // $('#example').DataTable();
    </script>
@endsection