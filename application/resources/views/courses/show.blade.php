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
    <div class="row">
        <div class="col-md-12">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Home</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-registrant" role="tab" aria-controls="nav-contact" aria-selected="false">Registrants</a>
                </div>
            </nav>

        </div>
    </div>


    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Info</h4>
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
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

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
                                            <a class="btn btn-primary" href="{{ route('courses.lectures.edit',[$course->id ,$lecture->id]) }}" role="button">
                                                Edit Lecture
                                            </a>
                                            <a class="btn btn-dark" href="{{ route('lectures.trainers-attendance.index', [$lecture->id]) }}" role="button">Trainers attendance</a>
                                            <a class="btn btn-dark" href="{{ route('lectures.trainees-attendance.index', [$lecture->id]) }}" role="button">Trainees attendance</a>
                                            <form action="{{ route('courses.lectures.destroy',[$course->id ,$lecture->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                                                    Delete
                                                </button>
                                            </form>
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

        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                            <button class="btn btn-danger">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <a href="{{ route('courses.trainers.create', ['course_id'=>$course->id]) }}" class="card-link">Add new</a>
                        </div>
                    </div>
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
