@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('evaluations.index') }}">Evaluations</a>
        </li>
        <li class="breadcrumb-item active">Trainer evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainer Evaluation</h1>
    {{--<hr>--}}

    @include('_partials.flash-messages')
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">courses</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Lectures</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Trainers</a>
                    <a class="nav-link"  href="{{ route('course_registration.index',[$course->id]) }}" >Registrants</a>
                    <a class="nav-link"  href="{{ route('course_evaluation.index',$course->id) }}">Course Evaluation</a>
                    <a class="nav-link active"  href="{{ route('trainer_evaluation.index',$course->id) }}">Trainer Evaluation</a>
                    <a class="nav-link"  href="{{ route('trainee_assessment.index',$course->id) }}">Trainee Assessment</a>

                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Trainer Name</th>
                    <th scope="col">Scientific Skills</th>
                    <th scope="col">Presentation Skills</th>
                    <th scope="col">Communication Skills</th>
                    <th scope="col">Average Trainee Satisfaction</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->assessments as $item)
                    <tr>
                        <td scope="col">{{$course->name}}</td>
                        <td scope="col">{{$item->trainee_id }}</td>
                        <td scope="col">{{$item->pretest}}</td>
                        <td scope="col">{{$item->posttest}}</td>
                        <td scope="col">{{$item->improvement}}</td>
                        <td scope="col">{{$item->average_trainee_satisfaction}}</td>
                        <td>
                            <form action="{{ route('trainee_assessment.destroy',[$course->id,$item->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
@endsection
