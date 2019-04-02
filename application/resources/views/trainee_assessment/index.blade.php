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
        <li class="breadcrumb-item active">Trainee Assisment</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainee Assisment</h1>
    {{--<hr>--}}
    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">
            <!--[$course->id]-->
            <form action="{{ route('trainee_assessment.store') }}" method="post">
                @csrf

                {{--<div class="form-group">--}}
                    {{--<div>--}}
                        {{--<select class="form-control" aria-describedby="selectHelpBlock">--}}
                            {{--@foreach($courses as $course)--}}
                                {{--<option value="{{$course->id}}">{{ $course->name }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div>--}}
                        {{--<select class="form-control" aria-describedby="selectHelpBlock">--}}
                            {{--@foreach($trainees as $trainee)--}}
                                {{--<option value="{{$trainee->id}}">{{ $trainee->name }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="files" multiple>
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>

                <table class="table">
                    <tbody>
                    <tr>
                        <td>Pretest average</td>
                        <td><input type="number" id="pretest" name="pretest"></td>
                    </tr>
                    <tr>
                        <td>Posttest average</td>
                        <td><input type="number" name="posttest" id="posttest"></td>
                    </tr>

                    <tr>
                        <td>Improvement percentage</td>
                        <td><input type="number" id="improvement" name="improvement"></td>
                    </tr>

                    <tr>
                        <td>Average trainee satisfaction</td>
                        <td><input type="number" id="average_trainee_satisfaction" name="average_trainee_satisfaction"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
