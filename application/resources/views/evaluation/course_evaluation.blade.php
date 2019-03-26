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
        <li class="breadcrumb-item active">Course evaluation</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Courses Evaluation</h1>
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




                        </thead>
                        <tbody>
                        <tr>
                            <th scope="col">Organization</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="_"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="_"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="_"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Educational tools</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="__"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="__"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="__"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Coffee break</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="___"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="___"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="___"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Overall evaluation</th>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="_____"> Unsatisfied
                                </label>
                                <label>
                                    <input type="radio" name="_____"> Satisfied
                                </label>
                                <label>
                                    <input type="radio" name="_____"> Highly Satisfied
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                <label for="">Additional comments</label>
                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
