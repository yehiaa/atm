@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href= "{{ route('course_evaluation.index', [$course->id]) }}"> Course Evaluation</a>

        </li>
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Evaluation <a href="{{ route('course_evaluation.create', [$course->id]) }}">Add new</a></h1>


    @include('_partials.flash-messages')
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">courses</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Lectures</a>
                    <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Trainers</a>
                    <a class="nav-link active"  href="{{ route('course_registration.index',[$course->id]) }}" >Registrants</a>
                    <a class="nav-link"  href="{{ route('course_evaluation.index',$course->id) }}">Course Evaluation</a>
                    <a class="nav-link"  href="{{ route('trainer_evaluation.index',$course->id) }}">Trainer Evaluation</a>
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
                        <th scope="col">trainee</th>
                        <th scope="col">Organization</th>
                        <th scope="col">Educational tools</th>
                        <th scope="col">Coffee break</th>
                        <th scope="col">Overall evaluation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($course->evaluations as $item)
                    <tr>
                        <td scope="col">{{$item->trainee->name }}</td>
                        <td scope="col">{{$item->organization}}</td>
                        <td scope="col">{{$item->educational_tools}}</td>
                        <td scope="col">{{$item->cofee_break}}</td>
                        <td scope="col">{{$item->overall_evaluation}}</td>
                    <td>
                        <form action="{{ route('course_evaluation.destroy',[$item->course_id, $item->id]) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">Delete</button>
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
