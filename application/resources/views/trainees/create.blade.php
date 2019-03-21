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

    <form method="post" action="{{ route('trainees.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ old('name') }}" type="text">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="m" @if(old('gender') == 'm') checked @endif type="radio">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="f" @if(old('gender') == 'f') checked @endif type="radio">
                        Female
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control here" value="{{ old('email') }}" type="text">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" class="form-control here" value="{{ old('phone') }}" type="text">
        </div>
        <div class="form-group">
            <label for="identity">Identity</label>
            <input id="identity" name="identity" class="form-control here" value="{{ old('identity') }}" type="text">
        </div>
        <div class="form-group">
            <label>Identity type</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="passport" @if(old('identity_type') == 'passport') checked @endif type="radio">
                        Passport
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="national" @if(old('identity_type') == 'national') checked @endif type="radio">
                        National
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control">
                <option value=""></option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select id="city" name="city" class="form-control" ></select>
        </div>

        <div class="form-group">
            <label for="government">Government</label>
            <input id="government" name="government" class="form-control here" value="{{ old('government') }}" type="text">
        </div>

        <div class="form-group">
            <label for="speciality_id">Specialities</label>
            <div>
                <select id="speciality_id" name="speciality_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($specialities as $speciality)
                        <option value="{{ $speciality->id }}" @if(old('speciality_id') == $speciality->id) selected @endif>{{ $speciality->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Specialities</span>
            </div>
        </div>

        <div class="form-group">
            <label for="attachment">Attachments</label>
            <input id="attachment" name="attachment"  class="form-control-file"  type="file">
            <span id="nameHelpBlock" class="form-text text-muted">Upload a single file</span>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="attachments">Attachments</label>--}}
            {{--<input type="file" id="attachments[]" name="attachments[]" class="form-control" multiple />--}}
            {{--<span class="form-text text-muted">to be done</span>--}}
        {{--</div>--}}

        <div class="form-group">
            <label for="refereedFrom">How did you know about us?</label>
            <div>
                <select id="refereedFrom" name="refereedFrom"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    <option @if(old('refereedFrom') == 'onSite') selected @endif value="onSite">OnSite</option>
                    <option @if(old('refereedFrom') == 'byPhone') selected @endif value="byPhone">ByPhone</option>
                    <option @if(old('refereedFrom') == 'delegated') selected @endif value="delegated">Delegated</option>
                    <option @if(old('refereedFrom') == 'facebook') selected @endif value="facebook">Facebook</option>
                    <option @if(old('refereedFrom') == 'whatsApp') selected @endif value="whatsApp">WhatsApp</option>
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Specialities</span>
            </div>
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection

@section('css')
    @parent()
@endsection

@section('js')
    <script src="{{ asset('js/countries.js') }}"></script>
    <script>
        initializeCountryAndCityControls('#country', '#city', 'body');
    </script>
@endsection
