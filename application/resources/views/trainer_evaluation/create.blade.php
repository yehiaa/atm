@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">

            <a href= "{{ route('courses.show', [$course->id]) }}">Course : {{$course->name}}</a>
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

            <form method="POST" action="{{ route('trainer_evaluation.store', $course->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="attachment" id="attachment" multiple value="{{old('attachment')}}">
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="course_id">Trainee</label>
                    <div>
                        <select id="trainee_id" name="trainee_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required="required">
                            @foreach($trainees as $trainee)
                                <option value="{{$trainee->id }}" @if(old('trainee_id') == $trainee->id) selected @endif >{{ $trainee->trainee->name }}</option>
                            @endforeach
                        </select>
                        <span id="selectHelpBlock" class="form-text text-muted">select Trainee</span>
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
                            <th scope="col">Presentation Skills</th>
                            <th scope="col">Communication Skills</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="unsatisfied" @if(old('scientific_skills') == 'unsatisfied') checked @endif > Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="satisfied" @if(old('scientific_skills') == 'satisfied') checked @endif> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][scientific_skills]" value="highly_Satisfied" @if(old('scientific_skills') == 'highly_satisfied') checked @endif> Highly Satisfied
                                </label>
                            </td>

                            <td>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="unsatisfied" @if(old('presentation_skills') == 'unsatisfied') checked @endif> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="satisfied" @if(old('presentation_skills') == 'satisfied') checked @endif> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][presentation_skills]" value="highly_Satisfied" @if(old('presentation_skills') == 'highly_satisfied') checked @endif> Highly Satisfied
                                </label>
                            </td>

                            <td>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="unsatisfied" @if(old('communication_skills') == 'unsatisfied') checked @endif> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="satisfied" @if(old('communication_skills') == 'satisfied') checked @endif> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="details[{{$trainer->id}}][communication_skills]" value="highly_Satisfied" @if(old('communication_skills') == 'highly_satisfied') checked @endif> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                @endforeach

                <label for="">Recommendation for improvements</label>
                <textarea class="form-control" name="recommendation"  cols="30" rows="5" value="{{old('recommendation')}}"></textarea>
                <label for="">Additional comments</label>
                <textarea class="form-control" name="comment"  cols="30" rows="5" value="{{old('comment')}}"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>



@endsection

@section('js')
@endsection
