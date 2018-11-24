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
    <h1>Courses <a href="{{ route('halls.create') }}">Add new</a></h1>
    <hr>

    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" autocomplete="off" placeholder="Name" class="form-control" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Course name</span>
        </div>

        <div class="form-group">
            <label for="alternative_name">Alternative name</label>
            <input id="alternative_name" name="alternative_name" autocomplete="off" placeholder="alternative name" class="form-control" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Alternative name</span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" cols="40" rows="5" class="form-control" aria-describedby="descriptionHelpBlock"></textarea>
            <span id="descriptionHelpBlock" class="form-text text-muted">description</span>
        </div>

        <div class="form-group">
            <label for="start_datetime">Start datetime</label>
            <input id="start_datetime" name="start_datetime" autocomplete="off" class="form-control" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Alternative name</span>
        </div>

        <div class="form-group">
            <label for="end_datetime">End datetime</label>
            <input id="end_datetime" name="end_datetime" autocomplete="off" class="form-control" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">Alternative name</span>
        </div>

        <div class="form-group">
            <label>Is active?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1">
                    <label class="form-check-label" for="is_active">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0">
                    <label class="form-check-label" for="is_active">No</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="text">Text Field</label>
            <input id="text" name="text" autocomplete="off" class="form-control" type="text">
        </div>
        <div class="form-group">
            <label for="select">Select</label>
            <div>
                <select id="select" name="select" class="form-control" aria-describedby="selectHelpBlock" required="required" multiple="multiple">
                    <option value="rabbit">Rabbit</option>
                    <option value="duck">Duck</option>
                    <option value="fish">Fish</option>
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">some help text</span>
            </div>
        </div>
        <div class="form-group">
            <label>Checkboxes</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Disabled checkbox
                    </label>
                </div>
                <span id="checkboxHelpBlock" class="form-text text-muted">help text goes here</span>
            </div>
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('js')
@endsection