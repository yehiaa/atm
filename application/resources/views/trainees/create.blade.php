@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('trainees.index') }}">Trainees</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Trainee</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('trainees.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" type="text">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="m" type="radio">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="f" type="radio">
                        Female
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="identity">Identity</label>
            <input id="identity" name="identity" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label>Identity type</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="passport" type="radio">
                        Passport
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="national" type="radio">
                        National
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input id="country" name="country" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input id="city" name="city" class="form-control here" type="text">
        </div>

        <div class="form-group">
            <label for="speciality_id">Specialities</label>
            <div>
                <select id="speciality_id" name="speciality_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Specialities</span>
            </div>
        </div>


        <div class="form-group">
            <label for="attachments">Attachments</label>
            <input type="file" id="attachments[]" name="attachments[]" class="form-control" multiple />
            <span class="form-text text-muted">to be done</span>
        </div>

        <div class="form-group">
            <label for="refereedFrom">How did you know about us?</label>
            <div>
                <select id="refereedFrom" name="refereedFrom"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    <option value="onSite">OnSite</option>
                    <option value="byPhone">ByPhone</option>
                    <option value="delegated">Delegated</option>
                    <option value="facebook">Facebook</option>
                    <option value="whatsApp">WhatsApp</option>
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Specialities</span>
            </div>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection

@section('js')
@endsection