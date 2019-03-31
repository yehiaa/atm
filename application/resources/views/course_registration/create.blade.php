@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('course_registration.index',[$course->id]) }}">Course registration</a>
        </li>
        <li class="breadcrumb-item active">Course registration</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Registration</h1>
    <hr>

    @include('_partials.flash-messages')

    <form method="post" action="{{ route('course_registration.store') }}">
        @csrf
        <div class="form-group">
            <label for="course_id">Course</label>
            <div>
                <select id="course_id" name="course_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required="required">
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
                <select id="trainee_id" name="trainee_id" class="form-control" style="width: 100%" aria-describedby="selectHelpBlock" required="required">
                    {{--@foreach($trainees as $trainee)--}}
                        {{--<option @if(old('trainee_id') == $trainee->id) selected @endif value="{{ $trainee->id }}">{{ $trainee->name }} {{{ $trainee->phone }}}</option>--}}
                    {{--@endforeach--}}
                </select>
                <span id="selectHelpBlock" class="form-text text-muted">Trainee</span>
            </div>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add_new_trainee_modal">
                Add new
            </button>
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
                        Affiliation
                    </label>
                </div>
        </div>

        <div class="form-group">
            <label for="affiliation_id">Affiliation</label>
            <div>
                <select id="affiliation_id" name="affiliation_id" class="form-control js-select2-enabled" aria-describedby="selectHelpBlock" required>
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

    {{--Modal dialog --}}
    <div class="modal fade" tabindex="-1" id="add_new_trainee_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new trainee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{----}}
                    <form method="post" action="{{ route('api_trainees_store') }}" id="form_add_trainee">
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
                            <input id="identity" name="identity" class="form-control here"  type="text">
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
                            <select id="country" name="country" class="form-control" style="width: 100%">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" name="city" class="form-control" style="width: 100%"></select>
                        </div>

                        <div class="form-group">
                            <label for="government">Government</label>
                            <input id="government" name="government" class="form-control here" value="" type="text">
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
                    {{----}}


                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('css')
    @parent()
@endsection

@section('js')
    @parent()
    <script src="{{ asset('js/countries.js') }}"></script>
    <script type="text/javascript">

        initializeCountryAndCityControls('#country', '#city', '#add_new_trainee_modal');

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

        $("#form_add_trainee").submit(function(e) {

            var self = this;
            var form = $(this);
            var url = form.attr('action');

            var ajaxResult = $.ajax({
                type: "POST",
                url: url,
                data: form.serialize()
            });

            ajaxResult.done(function (data) {
                console.info(data);
                var newOption = new Option(data.name + ' {' + data.phone +'}', data.id, true, true);
                // Append it to the select
                $('#trainee_id').append(newOption).trigger('change');
                $('#add_new_trainee_modal').modal('hide');
            });

            ajaxResult.fail(function (errors) {
                console.log(errors.responseJSON.errors);
                var fieldsErrors = [];
                for (var field in errors.responseJSON.errors){
                    fieldsErrors.push(errors.responseJSON.errors[field][0]);
                }
                alert(fieldsErrors.join('\n'));
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    </script>

@endsection
