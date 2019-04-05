@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">

            <a href= "{{ route('trainer_evaluation.index', [$course->id]) }}">Trainer Evaluation</a>
        </li>
        <li class="breadcrumb-item active">Trainer Evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainer Evaluation</h1>
    <hr>

    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">

            <form  method="post" action="{{ route('trainer_evaluation.store', [$course->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="files" multiple>
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Trainer Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="col">Scientific Skills </th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Presentation Skills</th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Communication Skills</th>
                    </tr>
                    <!--@foreach($course->trainers as $trainer)
                        @endforeach-->
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <label for="">Recommendation for improvements</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <label for="">Additional comments</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('trainee_assessment.store',[$course->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="reference">Course</label>
                    <select id="course_id" name="course_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required="required">
                        <option value="{{$course->id}}">
                            {{$course->name}}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_id">Trainee</label>
                    <div>
                        <select id="trainee_id" name="trainee_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required="required">
                            @foreach($trainees as $trainee)
                                <option value="{{$trainee->id }}" @if(old('trainee_id') == $trainee->id) selected @endif >{{ $trainee->trainee_name }}</option>
                            @endforeach
                        </select>
                        <span id="selectHelpBlock" class="form-text text-muted">select Trainee</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="files" multiple>
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>
                    <table class="table">
                        <thead></thead>
                        <tbody>
                        <tr>
                            <th scope="col">Pretest average</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="pretest" type="number" name="pretest" value="">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Post Test average</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="posttest" type="number" name="posttest" value="">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Improvement average</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="improvement" type="number" name="improvement" value="unsatisfied">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Average Trainee Satisfaction</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="average_trainee_satisfaction" type="number" name="average_trainee_satisfaction">
                                </label>
                            </td>
                        </tr>
                        </tbody>
                     </table>
                <label for="comment">Additional comments</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
