@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>

        <li class="breadcrumb-item active">Trainee Assessment</li>
    </ol>
    <!-- Page Content -->
    <h1>Trainee Assessment<a href="{{ route('trainee_assessment.create', [$course->id]) }}"> Add new</a></h1>
    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @can('course show')
                        <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">courses</a>
                        <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Lectures</a>
                        <a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Trainers</a>
                    @endcan
                    @can('courseRegistration list')
                        <a class="nav-link"  href="{{ route('course_registration.index',[$course->id]) }}" >Registrants</a>
                    @endcan
                    @can('courseEvaluation list')
                        <a class="nav-link"  href="{{ route('course_evaluation.index',[$course->id]) }}">Course Evaluation</a>
                    @endcan
                    @can('trainerEvaluation list')
                        <a class="nav-link"  href="{{ route('trainer_evaluation.index',[$course->id]) }}">Trainer Evaluation</a>
                    @endcan
                    @can('traineeAssessment list')
                        <a class="nav-link active"  href="{{ route('trainee_assessment.index',[$course->id]) }}">Trainee Assessment</a>
                    @endcan
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Course</th>
                        <th scope="col">Trainee</th>
                        <th scope="col">Pretest Average</th>
                        <th scope="col">Post Test Average</th>
                        <th scope="col">Improvement Percentage</th>
                        <th scope="col">Average Trainee Satisfaction</th>
                        <th scope="col">Attachment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course->traineeAssessments as $item)
                        <tr>
                            <td scope="col">{{$course->name}}</td>
                            <td scope="col">{{$item->trainee->name }}</td>
                            <td scope="col">{{$item->pretest}}</td>
                            <td scope="col">{{$item->posttest}}</td>
                            <td scope="col">{{$item->improvement}}</td>
                            <td scope="col">{{$item->average_trainee_satisfaction}}</td>
                            <td scope="col">
                                @if($item->attachment)
                                    <a target="_blank" href="{{asset("/storage/$item->attachment")}}">Attachment</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('trainee_assessment.destroy',[$item->course_id, $item->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    @can('traineeAssessment remove')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                        <tfoot>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Trainee</th>
                            <th scope="col">Pretest Average</th>
                            <th scope="col">Post Test Average</th>
                            <th scope="col">Improvement Percentage</th>
                            <th scope="col">Average Trainee Satisfaction</th>
                            <th scope="col">Attachment</th>
                        </tr>
                        </tfoot>
               </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
