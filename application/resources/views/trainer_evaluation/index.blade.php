@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>

        <li class="breadcrumb-item active">Trainer evaluation</li>
    </ol>

    <!-- Page Content -->
    @can('trainerEvaluation add')
    <h1>Trainer Evaluation ({{$course->name}})<a href="{{ route('trainer_evaluation.create', [$course->id]) }}"> Add new</a></h1>
    @endcan
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
                        <a class="nav-link active"  href="{{ route('trainer_evaluation.index',[$course->id]) }}">Trainer Evaluation</a>
                    @endcan
                    @can('traineeAssessment list')
                        <a class="nav-link"  href="{{ route('trainee_assessment.index',[$course->id]) }}">Trainee Assessment</a>
                    @endcan
                </div>
            </nav>
            {{--<nav>--}}
                {{--<div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
                    {{--<a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">courses</a>--}}
                    {{--<a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Lectures</a>--}}
                    {{--<a class="nav-link"  href="{{ route('courses.show', [$course->id]) }}">Trainers</a>--}}
                    {{--<a class="nav-link"  href="{{ route('course_registration.index',[$course->id]) }}" >Registrants</a>--}}
                    {{--<a class="nav-link"  href="{{ route('course_evaluation.index',[$course->id]) }}">Course Evaluation</a>--}}
                    {{--<a class="nav-link active"  href="{{ route('trainer_evaluation.index',[$course->id]) }}">Trainer Evaluation</a>--}}
                    {{--<a class="nav-link"  href="{{ route('trainee_assessment.index',[$course->id]) }}">Trainee Assessment</a>--}}
                {{--</div>--}}
            {{--</nav>--}}
        </div>
    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Trainee</th>
                                <th scope="col">Details</th>
                                <th scope="col">Attachment</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Recommendation</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($course->trainersEvaluations as $item)
                            <tr>
                                <td scope="col">{{ $item->trainee->name}}</td>
                                <td>@foreach($item->trainerEvaluationDetail as $detail)
                                        {{$detail->trainer->name}}
                                        <strong>Scientific</strong> {{$detail->scientific_skills}}
                                       <strong>Presentation</strong> {{$detail->presentation_skills}}
                                       <strong>Communication</strong> {{$detail->communication_skills}}
                                        <br/>
                                    @endforeach
                                </td>
                                <td scope="col">
                                    @if($item->attachment)
                                    <a target="_blank" href="{{asset("/storage/$item->attachment")}}">Attachment</a>
                                    @endif
                                </td>
                                <td scope="col">{{ $item->trainee->comment}}</td>
                                <td scope="col">{{ $item->trainee->recommendation}}</td>
                                @can('trainer_evaluation remove')
                                <td>
                                    <form action="{{ route('trainer_evaluation.destroy',[$item->course_id, $item->id]) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endcan
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
