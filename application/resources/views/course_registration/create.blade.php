@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        {{--<li class="breadcrumb-item">--}}
            {{--<a href="{{ route('course_registration.create') }}">Course registration</a>--}}
        {{--</li>--}}
        <li class="breadcrumb-item active">Course registration</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Registration</h1>
    <hr>

    @include('_partials.flash-messages')

    <form method="post" action="{{ route('course_registration.create') }}">
        @csrf
        <div class="form-group">
            <label for="course_id">Course</label>
            <div>
                <select id="course_id" name="course_id" class="form-control" aria-describedby="selectHelpBlock" required="required">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">select the course</span>
            </div>
        </div>



        <div class="form-group">
            <label for="trainee_id">Trainee / Registrant</label>
            <div>
                <select id="trainee_id" name="trainee_id" class="form-control" aria-describedby="selectHelpBlock" required="required">
                    @foreach($trainees as $trainee)
                        <option value="{{ $trainee->id }}">{{ $trainee->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Trainee</span>
            </div>
        </div>

        <div class="form-group">
            <label>Payment type</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="1">
                    Cash</label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="2">
                    Visa</label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="payment_type" id="payment_type" value="3">
                        Nomination</label>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="select">Nominations</label>
            <div>
                <select id="select" name="select" class="form-control" aria-describedby="selectHelpBlock">
                    @foreach($nominations as $nomination)
                        <option value="{{ $nomination->id }}">{{ $nomination->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Trainee</span>
            </div>
        </div>

        <div class="form-group">
            <label for="text">Reference code / number</label>
            <input id="text" name="text" autocomplete="off" class="form-control" type="text">
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('js')
@endsection