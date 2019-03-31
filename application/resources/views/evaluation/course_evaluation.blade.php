@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">

            <a href= "{{ route('course_evaluation.create', [$course->id]) }}">Evaluations</a>
        </li>
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Evaluation</h1>
    {{--<hr>--}}

    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('course_evaluation.store',[$course->id]) }}">
                <did>
                    <h2> Course</h2>
                </did>
                @csrf
                <div class="form-group">
                    <label for="course_id">Course</label>
                    <div>
                        <select id="course_id" name="course_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required="required">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" @if(old('course_id') == $course->id) selected @endif >{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <span id="selectHelpBlock" class="form-text text-muted">select the course</span>
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
                            <th scope="col">Organization</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="organization" type="radio" name="organization"> Unsatisfied
                                </label>
                                <label>
                                    <input id="organization" type="radio" name="organization"> Satisfied
                                </label>
                                <label>
                                    <input id="organization" type="radio" name="organization"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Educational tools</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools"> Unsatisfied
                                </label>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools"> Satisfied
                                </label>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Coffee break</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break"> Unsatisfied
                                </label>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break"> Satisfied
                                </label>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Overall evaluation</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation"> Unsatisfied
                                </label>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation"> Satisfied
                                </label>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation"> Highly Satisfied
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
