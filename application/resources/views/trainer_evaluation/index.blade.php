@extends('layouts.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('evaluations.index') }}">Evaluations</a>
        </li>
        <li class="breadcrumb-item active">Trainer evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainer Evaluation</h1>
    {{--<hr>--}}

    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">

            <form>
                @csrf
                <div class="form-group">
                    <label for="files">Attachments</label>
                    <div>
                        <input type="file" name="files" multiple>
                        <span id="selectHelpBlock" class="form-text text-muted">Evaluations attachments</span>
                    </div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Trainer Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="col">Scientific Skills </th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}_"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Presentation Skills</th>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Unsatisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Satisfied
                            </label>
                            <label>
                                <input type="radio" name="{{$trainer->name}}__"> Highly Satisfied
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Communication Skills</th>
                    </tr>
                    <!--@foreach($course->trainers as $trainer)
                        @endforeach-->
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="{{$trainer->name}}"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <label for="">Recommendation for improvements</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <label for="">Additional comments</label><textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
