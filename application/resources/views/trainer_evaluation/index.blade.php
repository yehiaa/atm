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
    <h1></h1>
    <h1>Trainer Evaluation<a href="{{ route('trainer_evaluation.create', [$course->id]) }}"> Add new</a></h1>
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
                    <a class="nav-link"  href="{{ route('course_evaluation.index',[$course->id]) }}">Course Evaluation</a>
                    <a class="nav-link active"  href="{{ route('trainer_evaluation.index',[$course->id]) }}">Trainer Evaluation</a>
                    <a class="nav-link"  href="{{ route('trainee_assessment.index',[$course->id]) }}">Trainee Assessment</a>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form method="POST" action="{{ route('trainer_evaluation.store', $course->id) }}">
                @csrf
                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="files" multiple>
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>

                @foreach ($course->trainers as $trainer)

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Trainer Name {{ $trainer->name }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="col">Scientific Skills </th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="unsatisfied"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="satisfied"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="highly_Satisfied"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Presentation Skills</th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="unsatisfied"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="satisfied"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="highly_Satisfied"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Communication Skills</th>
                    </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="unsatisfied"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="satisfied"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="highly_Satisfied"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <hr>
                @endforeach

                <label for="">Recommendation for improvements</label><textarea class="form-control" name="recommendations"  cols="30" rows="5"></textarea>
                <label for="">Additional comments</label><textarea class="form-control" name="additional_comments"  cols="30" rows="5"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
