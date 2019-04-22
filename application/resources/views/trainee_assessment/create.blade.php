@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        @can('course show')
        <li class="breadcrumb-item">
            <a href= "{{ route('courses.show', [$course->id]) }}">Course {{ $course->name }}</a>
        </li>
        @endcan
        <li class="breadcrumb-item active">Trainee Assessment</li>
    </ol>

    <!-- Page Content -->
    <h1>Trainee Assessment</h1>
    <hr>

    @include('_partials.flash-messages')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('trainee_assessment.store',[$course->id]) }}" enctype="multipart/form-data">
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
                        <input type="file" name="attachment" multiple>
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
                                    <input id="pretest" type="number" name="pretest" value="{{old('pretest')}}" required="required">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Post Test average</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="posttest" type="number" name="posttest" value="{{old('posttest')}}" required="required">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Improvement average</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="improvement" type="number" name="improvement" value="{{old('improvement')}}" required="required">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Average Trainee Satisfaction</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="average_trainee_satisfaction" type="number" name="average_trainee_satisfaction" value="{{old('average_trainee_satisfaction')}}" required="required">
                                </label>
                            </td>
                        </tr>
                        </tbody>
                     </table>
                <label for="comment">Additional comments</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" value="{{old('comment')}}"></textarea>
                <div class="form-group">
                    @can('traineeAssessment add')
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                    @endcan
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
