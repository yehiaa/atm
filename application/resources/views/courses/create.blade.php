@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('courses.index') }}">Courses</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Course</h1>
    <hr>

    @include('_partials.flash-messages')

    <form method="post" action="{{ route('courses.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" autocomplete="off" placeholder="Name" class="form-control" value="{{ old('name') }}" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Course name</span>
        </div>

        <div class="form-group">
            <label for="alternative_name">Alternative name</label>
            <input id="alternative_name" name="alternative_name" autocomplete="off" placeholder="alternative name" value="{{ old('alternative_name') }}" class="form-control" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Alternative name</span>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" name="price" autocomplete="off" placeholder="price" value="{{ old('price') }}" class="form-control" aria-describedby="nameHelpBlock" required="required" type="number">
            <span id="nameHelpBlock" class="form-text text-muted">Price</span>
        </div>

        <div class="form-group">
            <label for="percentage_to_pass">Percentage to pass</label>
            <input id="percentage_to_pass" name="percentage_to_pass" autocomplete="off" placeholder="percentage_to_pass" value="{{ old('percentage_to_pass') }}" class="form-control" aria-describedby="nameHelpBlock" required="required" type="number">
            <span id="nameHelpBlock" class="form-text text-muted">Attendance percentage to pass from 0 to 100 %</span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" cols="40" rows="2" class="form-control"  aria-describedby="descriptionHelpBlock">{{ old('description') }}</textarea>
            <span id="descriptionHelpBlock" class="form-text text-muted">description</span>
        </div>

        <div class="form-group">
            <label for="start_datetime">Start datetime</label>
            <input id="start_datetime" name="start_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ old('start_datetime') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">start date</span>
        </div>

        <div class="form-group">
            <label for="end_datetime">End datetime</label>
            <input id="end_datetime" name="end_datetime" autocomplete="off" class="form-control datetime" aria-describedby="nameHelpBlock" value="{{ old('end_datetime') }}" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">end date</span>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="select">Trainer</label>--}}
            {{--<div>--}}
                {{--<select id="select" name="select" class="form-control" aria-describedby="selectHelpBlock" required="required" multiple="multiple">--}}
                    {{--<option value="rabbit">Rabbit</option>--}}
                    {{--<option value="duck">Duck</option>--}}
                    {{--<option value="fish">Fish</option>--}}
                {{--</select>--}}
                {{--<span id="selectHelpBlock" class="form-text text-muted">some help text</span>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('js')
    <script>
    $('.datetime').datetimepicker();

    // jQuery('.datetime').datetimepicker({
    // datepicker:false,
    // format:'H:i'
    // });
    </script>
@endsection