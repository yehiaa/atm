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
            <label for="country">Country</label>
            <input id="country" name="country" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input id="city" name="city" class="form-control here" type="text">
        </div>
        <div class="form-group">
            <label for="bank_name">Bank name</label>
            <input id="bank_name" name="bank_name" class="form-control here" type="text">
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
            <label for="attachments">Attachments</label>
            <input type="file" id="attachments[]" name="attachments[]" class="form-control" multiple />
        </div>

        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection

@section('js')
@endsection