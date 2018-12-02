@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('nominations.index') }}">Nominations</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Nomination</h1>
    <hr>
    @include('_partials.flash-messages')

    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="Name" class="form-control here" aria-describedby="nameHelpBlock" required="required" type="text">
            <span id="nameHelpBlock" class="form-text text-muted">nomination name</span>
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
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>


@endsection

@section('js')
@endsection