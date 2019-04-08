@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href= "{{ route('courses.show', [$course->id]) }}">Course {{ $course->name }}</a>
        </li>
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h2>Courses Evaluation</h2>
    <hr>

    @include('_partials.flash-messages')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('course_evaluation.store',[$course->id]) }}" enctype="multipart/form-data">
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
                    <label for="attachment">Attachments</label>
                    <div>
                        <input type="file" name="attachment" multiple id="attachment" value="{{old('attachment')}}" >
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
                                    <input id="organization" type="radio" name="organization" value="unsatisfied" @if(old('organization') == 'unsatisfied') checked @endif > Unsatisfied
                                </label>
                                <label>
                                    <input id="organization" type="radio" name="organization" value="satisfied" @if(old('organization') == 'satisfied') checked @endif> Satisfied
                                </label>
                                <label>
                                    <input id="organization" type="radio" name="organization" value="highly_satisfied" @if(old('organization') == 'highly_satisfied') checked @endif> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Educational tools</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools" value="unsatisfied" @if(old('educational_tools') == 'unsatisfied') checked @endif> Unsatisfied
                                </label>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools" value="satisfied" @if(old('educational_tools') == 'satisfied') checked @endif > Satisfied
                                </label>
                                <label>
                                    <input id="educational_tools" type="radio" name="educational_tools" value="highly_satisfied" @if(old('educational_tools') == 'highly_satisfied') checked @endif > Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Coffee break</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break" value="unsatisfied" @if(old('cofee_break') == 'unsatisfied') checked @endif > Unsatisfied
                                </label>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break" value="satisfied" @if(old('cofee_break') == 'satisfied') checked @endif > Satisfied
                                </label>
                                <label>
                                    <input id="cofee_break" type="radio" name="cofee_break" value="highly_satisfied" @if(old('cofee_break') == 'highly_satisfied') checked @endif > Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Overall evaluation</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation" value="unsatisfied" @if(old('overall_evaluation') == 'unsatisfied') checked @endif > Unsatisfied
                                </label>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation" value="satisfied" @if(old('overall_evaluation') == 'satisfied') checked @endif > Satisfied
                                </label>
                                <label>
                                    <input id="overall_evaluation" type="radio" name="overall_evaluation" value="highly_satisfied" @if(old('overall_evaluation') == 'highly_satisfied') checked @endif> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <label for="comment">Additional comments</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" {{old('comment')}}></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
