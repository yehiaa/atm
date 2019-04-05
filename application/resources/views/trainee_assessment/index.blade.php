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
        <li class="breadcrumb-item active">Trainee Assessment</li>
    </ol>

    <p>This is for demo purposes</p>
    <!-- Page Content -->
    <h1>Trainee Assessment<a href="{{ route('trainee_assessment.create', [$course->id]) }}"> Add new</a></h1>
    @include('_partials.flash-messages')

    <div class="row">
        <div class="col-md-12">
            <form>
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">course</th>
                        <th scope="col">trainee</th>
                        <th scope="col">Pretest average</th>
                        <th scope="col">Posttest average</th>
                        <th scope="col">Improvement percentage</th>
                        <th scope="col">Average trainee satisfaction</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td scope="col">{{$course->name}}</td>
                            <td scope="col">{{$item->trainee_name }}</td>
                            <td scope="col">{{$item->pretest}}</td>
                            <td scope="col">{{$item->posttest}}</td>
                            <td scope="col">{{$item->improvement}}</td>
                            <td scope="col">{{$item->average_trainee_satisfaction}}</td>
                            <td>
                                <form action="{{ route('trainee_assessment.destroy',[$item->course_id, $item->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{$item->name}}?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@endsection

@section('js')
@endsection
