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
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Evaluation</h1>
    {{--<hr>--}}

    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">

    <form>
        @csrf
        <div class="form-group">
            <label for="trainee_id">Trainee</label>
            <div>
                <select id="trainee_id" name="trainee_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($course->registrations as $registration)
                        <option value="{{ $registration->trainee->id }}" @if(old('trainee_id') == $registration->trainee->id) selected @endif>{{ $registration->trainee->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Registered trainees</span>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Trainer Name</th>
                <th scope="col">Scientific Skills </th>
                <th scope="col">Presentation Skills</th>
                <th scope="col">Communication Skills</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->trainers as $trainer)
                <tr>
                    <th scope="row">{{ $trainer->name }}</th>
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
                    <td>
                        <label>
                            <input type="radio" name="{{$trainer->name}}__"> Unsatisfied
                        </label>
                        <label>
                            <input type="radio" name="{{$trainer->name}}__"> Satisfied
                        </label>
                        <label>
                            <input type="radio" name="{{$trainer->name}}_"_> Highly Satisfied
                        </label>
                    </td>
                </tr>

                {{--<div class="form-group">--}}
                    {{--<label>--}}
                        {{--<input name="text" autocomplete="off" class="form-control" type="radio">--}}
                    {{--</label>--}}
                {{--</div>--}}
            @endforeach

            </tbody>
        </table>

        <label for="">Recommendation for improvements</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Organization</th>
                <th scope="col">Educational tools</th>
                <th scope="col">Coffee break</th>
                <th scope="col">Overall evaluation</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label>
                            <input type="radio" name="_"> Unsatisfied
                        </label>
                        <label>
                            <input type="radio" name="_"> Satisfied
                        </label>
                        <label>
                            <input type="radio" name="_"> Highly Satisfied
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="__"> Unsatisfied
                        </label>
                        <label>
                            <input type="radio" name="__"> Satisfied
                        </label>
                        <label>
                            <input type="radio" name="__"> Highly Satisfied
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="___"> Unsatisfied
                        </label>
                        <label>
                            <input type="radio" name="___"> Satisfied
                        </label>
                        <label>
                            <input type="radio" name="___"> Highly Satisfied
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="_____"> Unsatisfied
                        </label>
                        <label>
                            <input type="radio" name="_____"> Satisfied
                        </label>
                        <label>
                            <input type="radio" name="_____"> Highly Satisfied
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
        <label for="">Additional comments</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
        </div>
    </div>

@endsection

@section('js')
@endsection