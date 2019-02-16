@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('trainers.index') }}">Trainers</a>
        </li>
        <li class="breadcrumb-item active">Create new</li>
    </ol>

    <!-- Page Content -->
    <h1>Trainer</h1>
    <hr>
    @include('_partials.flash-messages')

    <form method="post" action="{{ route('trainers.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" placeholder="name" class="form-control here" type="text">
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
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="hidden" name="is_cooperate"  value="0">
                    <input class="form-check-input" type="checkbox" @if(old('is_cooperate') == 1) checked @endif name="is_cooperate" id="is_cooperate" value="1">
                    Is cooperate ? </label>
            </div>
        </div>

        <div class="form-group">
            <label for="affiliate_university">Affiliate university</label>
            <input id="affiliate_university" name="affiliate_university" class="form-control here" type="text">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country" class="form-control">
                <option value=""></option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select id="city" name="city" class="form-control here"></select>
        </div>
        <div class="form-group">
            <label for="bank_name">Bank name</label>
            <input id="bank_name" name="bank_name" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="bank_branch">Bank branch</label>
            <input id="bank_branch" name="bank_branch" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="bank_account_number">Bank acc number</label>
            <input id="bank_account_number" name="bank_account_number" class="form-control here" type="text">
        </div>

        <div class="form-group">
            <label for="experiences">Experiences</label>
            <textarea id="experiences" name="experiences" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="speciality_id">Speciality</label>
            <div>
                <select id="speciality_id" name="speciality_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($specialities as $speciality)
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Speciality</span>
            </div>
        </div>


        <div class="form-group">
            <label for="university_affiliation_id">University affiliation</label>
            <div>
                <select id="university_affiliation_id" name="university_affiliation_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($universityAffiliations as $universityAffiliation)
                        <option value="{{ $universityAffiliation->id }}">{{ $universityAffiliation->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="professional_data_id">Professional data</label>
            <div>
                <select id="professional_data_id" name="professional_data_id"
                        class="form-control"
                        aria-describedby="selectHelpBlock" >
                    @foreach($professionalData as $professionalDataItem)
                        <option value="{{ $professionalDataItem->id }}">{{ $professionalDataItem->name }}</option>
                    @endforeach
                </select>
                <span id="selectHelpBlock" class="form-text text-muted"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="attachments">Attachments</label>
            <input type="file" id="attachments[]" name="attachments[]" class="form-control" multiple />
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection

@section('css')
    @parent()
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/countries.js') }}"></script>
    <script>
        initializeCountryAndCityControls('#country', '#city', 'body');
    </script>
@endsection