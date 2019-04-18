@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            @can('hall list')
            <a href="{{ route('halls.index') }}">Halls</a>
            @endcan
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>New Hall</h1>
    <hr>
    @include('_partials.flash-messages')


    <form method="post" action="{{ route('halls.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" class="form-control here" required="required" type="text">
        </div>
        <div class="form-group">
            <label>Is active</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="is_active" class="form-check-input" value="1" aria-describedby="is_activeHelpBlock" type="checkbox">
                        Yes
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="is_active" class="form-check-input" value="0" aria-describedby="is_activeHelpBlock" type="checkbox">
                        No
                    </label>
                </div>
                <span id="is_activeHelpBlock" class="form-text text-muted">this is help text</span>
            </div>
        </div>
        <div class="form-group">
            @can('hall add')
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            @endcan
        </div>
    </form>


@endsection

@section('js')
@endsection
