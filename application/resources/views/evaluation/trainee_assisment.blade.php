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
        <li class="breadcrumb-item active">Trainee Assisment</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainee Assisment</h1>
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


                <label for="">Additional comments</label>
                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <table class="table">
                    <h1>Trainee Assisment</h1>
                    <tbody>
                    <tr>
                        <td>Pretest average</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Posttest average</td>
                        <td><input type="number"></td>
                    </tr>

                    <tr>
                        <td>Improvement percentage</td>
                        <td><input type="number"></td>
                    </tr>

                    <tr>
                        <td>Average trainee satisfaction</td>
                        <td><input type="number"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
