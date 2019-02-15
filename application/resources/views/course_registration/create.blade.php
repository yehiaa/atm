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
                        <option value="{{ $course->id }}" @if(old('course_id') == $course->id) selected @endif >{{ $course->name }}</option>
                        @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">select the course</span>
            </div>
        </div>



        <div class="form-group">
            <label for="trainee_id">Trainee / Registrant</label>
            <div>
                <select id="trainee_id" name="trainee_id" class="form-control" aria-describedby="selectHelpBlock" required="required">
                    {{--@foreach($trainees as $trainee)--}}
                        {{--<option @if(old('trainee_id') == $trainee->id) selected @endif value="{{ $trainee->id }}">{{ $trainee->name }} {{{ $trainee->phone }}}</option>--}}
                    {{--@endforeach--}}
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Trainee</span>
            </div>
        </div>

        <div class="form-group">
            <label>Payment type</label>
                {{--<div class="form-check form-check-inline">--}}
                    {{--<label class="form-check-label">--}}
                    {{--<input class="form-check-input" type="radio" name="payment_type" @if(old('payment_type') == '1') checked @endif id="payment_type" value="1">--}}
                    {{--Cash</label>--}}
                {{--</div>--}}
                {{--<div class="form-check form-check-inline">--}}
                    {{--<label class="form-check-label">--}}
                    {{--<input class="form-check-input" type="radio" name="payment_type" @if(old('payment_type') == '2') checked @endif id="payment_type" value="2">--}}
                    {{--Visa</label>--}}
                {{--</div>--}}

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="payment_type" id="payment_type" checked value="3">
                        Affiliation</label>
                </div>
        </div>

        <div class="form-group">
            <label for="affiliation_id">Affiliation</label>
            <div>
                <select id="affiliation_id" name="affiliation_id" class="form-control" aria-describedby="selectHelpBlock" required>
                    <option value=""></option>
                    @foreach($affiliations as $affiliation)
                        <option value="{{ $affiliation->id }}" @if(old('affiliation_id') == $affiliation->id) selected @endif >{{ $affiliation->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Affiliation</span>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" @if(old('is_paid') == 1) checked @endif name="is_paid" id="is_paid" value="1">
                    Is paid ? </label>
            </div>
        </div>

        <div class="form-group">
            <label for="reference">Reference code / number</label>
            <input id="reference" name="reference" value="{{ old('reference') }}" autocomplete="off" class="form-control" type="text">
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('css')
    @parent()
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    @parent()
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#trainee_id').select2({
            placeholder: 'Select a trainee by name, phone, ID or email',
            ajax: {
                url: '{{ route('api_trainees') }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name + ' {' + item.phone +'}',
                                id: item.id
                            }
                        })
                    };
                },
                // cache: true
            }
        });
        // $('#trainee_id').select2({
        //     placeholder: 'Select a trainee by name, phone, ID or email'
        // });
    </script>

@endsection