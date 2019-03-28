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
        <li class="breadcrumb-item active">Edit trainee  {{ $trainee->name }}</li>
    </ol>

    <!-- Page Content -->
    <h1>Trainee</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('trainees.update', [$trainee->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" value="{{ $trainee->name }}" type="text">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="m" @if($trainee->gender == 'm') checked @endif type="radio">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="gender" class="form-check-input" value="f" @if($trainee->gender == 'f') checked @endif type="radio">
                        Female
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" class="form-control here" value="{{ $trainee->email }}" type="text">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" class="form-control here" value="{{ $trainee->phone }}" type="text">
        </div>
        <div class="form-group">
            <label for="identity">Identity</label>
            <input id="identity" name="identity" class="form-control here" value="{{ $trainee->identity }}" type="text">
        </div>
        <div class="form-group">
            <label>Identity type</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="passport" @if($trainee->identity_type == 'passport') checked @endif type="radio">
                        Passport
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input name="identity_type" class="form-check-input" value="national" @if($trainee->identity_type == 'national') checked @endif type="radio">
                        National
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control">

            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select id="city" name="city" class="form-control" >

            </select>
        </div>

        <div class="form-group">
            <label for="speciality_id">Specialities</label>
            <div>
                <select id="speciality_id" name="speciality_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($specialities as $speciality)
                        <option value="{{ $speciality->id }}" @if($trainee->speciality_id == $speciality->id) selected @endif>
                            {{ $speciality->name }}
                        </option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Specialities</span>
            </div>
        </div>


        <div class="form-group">
            <label for="attachment">Attachment</label>
            <input type="file" id="attachment" name="attachment" class="form-control"  />
            <span class="form-text text-muted">to be done</span>
        </div>

        <div class="form-group">
            <label for="refereedFrom">How did you know about us?</label>
            <div>
                <select id="refereedFrom" name="refereedFrom"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    <option @if($trainee->refereedFrom == 'onSite') selected @endif value="onSite">OnSite</option>
                    <option @if($trainee->refereedFrom == 'byPhone') selected @endif value="byPhone">ByPhone</option>
                    <option @if($trainee->refereedFrom == 'delegated') selected @endif value="delegated">Delegated</option>
                    <option @if($trainee->refereedFrom == 'facebook') selected @endif value="facebook">Facebook</option>
                    <option @if($trainee->refereedFrom == 'whatsApp') selected @endif value="whatsApp">WhatsApp</option>
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
    <script src="{{ asset('js/countries.js') }}"></script>
    <script>
        var clb = function (country, city){
            country.val("{{ $trainee->country }}");
            country.trigger('change');
            city.val("{{ $trainee->city }}");
            city.trigger('change');
        }

        initializeCountryAndCityControls('#country', '#city', 'body', clb);

    </script>
@endsection
